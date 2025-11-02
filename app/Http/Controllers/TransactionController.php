<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ServiceDetail;
use App\Models\SparePart;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi dengan fitur pencarian dan filter
     */
    public function index(Request $request)
    {
        $query = Transaction::with(['customer', 'user']);

        // 🔍 Pencarian berdasarkan kode invoice, nama pelanggan, atau mekanik
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('kode_invoice', 'like', "%{$search}%")
                ->orWhereHas('customer', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                });
        }

        // 🏷️ Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 📅 Filter berdasarkan rentang tanggal masuk
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tgl_masuk', [$request->start_date, $request->end_date]);
        }

        $transactions = $query->latest()->get();

        $totalTransactions = Transaction::count();
        $borrowedTransactions = Transaction::where('status', 'dalam proses')->count();

        return view('dashboard.transactions', compact(
            'transactions',
            'totalTransactions',
            'borrowedTransactions'
        ));
    }

    /**
     * Menyimpan transaksi baru beserta detail pertama
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required|exists:tb_customer,id_customer',
            'id_sparepart' => 'required|exists:tb_sparepart,id_sparepart',
            'qty' => 'required|integer|min:1',
        ]);

        // Buat transaksi baru
        $transaction = Transaction::create([
            'kode_invoice' => 'INV-' . time(),
            'id_customer' => $request->id_customer,
            'id_user' => Auth::user()->id_user,
            'status' => 'baru',
            'pembayaran' => 'belum_dibayar',
            'tgl_masuk' => now(),
        ]);

        // Tambahkan detail sparepart pertama
        $sparepart = SparePart::findOrFail($request->id_sparepart);
        ServiceDetail::create([
            'id_service' => $transaction->id_service,
            'id_sparepart' => $sparepart->id_sparepart,
            'qty' => $request->qty,
            'harga' => $sparepart->harga,
            'keterangan' => 'Ditambahkan otomatis saat transaksi baru',
        ]);

        return back()->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail transaksi + daftar sparepart-nya
     */
    public function show($id)
    {
        $transaction = Transaction::with(['details.sparepart', 'customer', 'user'])
            ->findOrFail($id);

        return view('dashboard.transactions.show', compact('transaction'));
    }

    /**
     * Tambahkan sparepart ke transaksi
     */
    public function addDetail(Request $request, $id)
    {
        $request->validate([
            'id_sparepart' => 'required|exists:tb_sparepart,id_sparepart',
            'qty' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $transaction = Transaction::findOrFail($id);
        $sparepart = SparePart::findOrFail($request->id_sparepart);

        ServiceDetail::create([
            'id_service' => $transaction->id_service,
            'id_sparepart' => $sparepart->id_sparepart,
            'qty' => $request->qty,
            'harga' => $sparepart->harga,
            'keterangan' => $request->keterangan ?? 'Tambahan dari mekanik',
        ]);

        return back()->with('success', 'Sparepart berhasil ditambahkan ke transaksi!');
    }

    /**
     * Menghapus satu detail sparepart dari transaksi
     */
    public function deleteDetail($id, $detail_id)
    {
        $detail = ServiceDetail::where('id_service', $id)
            ->where('id_detail', $detail_id)
            ->firstOrFail();

        $detail->delete();

        return back()->with('success', 'Sparepart berhasil dihapus dari transaksi!');
    }

    /**
     * Update status transaksi
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,dalam proses,selesai,diambil',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();

        return back()->with('success', 'Status transaksi berhasil diperbarui!');
    }
}
