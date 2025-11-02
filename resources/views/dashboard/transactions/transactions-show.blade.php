@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-xl font-semibold mb-4 text-[#1b1b18] dark:text-white">Detail Transaksi Service</h1>

    <div class="border border-[#e3e3e0] bg-white dark:bg-[#161615] rounded-sm p-4 mb-6">
        <h2 class="font-medium mb-3">Informasi Transaksi</h2>
        <table class="text-sm w-full">
            <tr><td class="py-1 font-medium w-40">Kode Invoice</td><td>: {{ $transaction->kode_invoice }}</td></tr>
            <tr><td class="py-1 font-medium">Customer</td><td>: {{ $transaction->customer->nama ?? '-' }}</td></tr>
            <tr><td class="py-1 font-medium">Mekanik</td><td>: {{ $transaction->user->nama ?? '-' }}</td></tr>
            <tr><td class="py-1 font-medium">Tanggal Masuk</td><td>: {{ $transaction->tgl_masuk }}</td></tr>
            <tr><td class="py-1 font-medium">Status</td><td>: {{ ucfirst($transaction->status) }}</td></tr>
            <tr><td class="py-1 font-medium">Pembayaran</td><td>: {{ ucfirst($transaction->pembayaran) }}</td></tr>
        </table>
    </div>

    <div class="border border-[#e3e3e0] bg-white dark:bg-[#161615] rounded-sm p-4">
        <h2 class="font-medium mb-3">Sparepart Digunakan</h2>
        <table class="w-full border-collapse text-sm">
            <thead class="bg-gray-100 dark:bg-[#0f0f0f]">
                <tr>
                    <th class="border px-3 py-2">#</th>
                    <th class="border px-3 py-2">Sparepart</th>
                    <th class="border px-3 py-2 text-right">Qty</th>
                    <th class="border px-3 py-2 text-right">Harga</th>
                    <th class="border px-3 py-2 text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaction->details as $detail)
                    <tr>
                        <td class="border px-3 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-3 py-2">{{ $detail->sparepart->nama_sparepart ?? '-' }}</td>
                        <td class="border px-3 py-2 text-right">{{ $detail->qty }}</td>
                        <td class="border px-3 py-2 text-right">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="border px-3 py-2 text-right">Rp {{ number_format($detail->qty * $detail->harga, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-3 text-gray-500">Belum ada sparepart</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('dashboard.transactions') }}" class="inline-block bg-blue-700 hover:bg-blue-800 text-white text-sm px-4 py-2 rounded-sm">
            ← Kembali
        </a>
    </div>
</div>
@endsection
