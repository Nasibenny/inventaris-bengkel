<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    /**
     * Menampilkan daftar spare parts.
     */
    public function index()
    {
        $spareparts = SparePart::all();
        return view('dashboard.spareparts', compact('spareparts'));
    }

    /**
     * Menampilkan form untuk menambah spare part baru.
     */
    public function create()
    {
        return view('dashboard.spareparts-create');
    }

    /**
     * Menyimpan spare part baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sparepart' => 'required|string|max:255',
            'kode_sparepart' => 'required|string|max:100',
            'jenis' => 'required|in:oli,busi,ban,kampas_rem,lainnya',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        SparePart::create([
            'nama_sparepart' => $request->nama_sparepart,
            'kode_sparepart' => $request->kode_sparepart,
            'jenis' => $request->jenis,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'id_outlet' => auth()->user()->id_outlet,
        ]);

        return redirect()->route('spareparts.index')->with('success', 'Spare part berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit spare part.
     */
    public function edit($id)
    {
        $sparepart = SparePart::findOrFail($id);
        return view('dashboard.spareparts-edit', compact('sparepart'));
    }

    /**
     * Menyimpan perubahan data spare part.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sparepart' => 'required|string|max:255',
            'kode_sparepart' => 'required|string|max:100',
            'jenis' => 'required|in:oli,busi,ban,kampas_rem,lainnya',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $sparepart = SparePart::findOrFail($id);
        $sparepart->update($request->all());

        return redirect()->route('spareparts.index')->with('success', 'Spare part berhasil diperbarui!');
    }

    /**
     * Menghapus spare part.
     */
    public function destroy($id)
    {
        $sparepart = SparePart::findOrFail($id);
        $sparepart->delete();

        return redirect()->route('spareparts.index')->with('success', 'Spare part berhasil dihapus!');
    }
}
