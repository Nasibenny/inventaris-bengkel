@extends('dashboard.layout')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-white">Dashboard</h1>

    <div class="bg-gray-800 rounded-2xl p-6 shadow">
        <h2 class="text-lg mb-3">Welcome, Admin</h2>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400">Total Stock</p>
                <h3 class="text-5xl text-yellow-400 font-semibold">{{ $totalStock ?? '12,450' }}</h3>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-700 p-4 rounded-lg text-center">
                    <p class="text-gray-400 text-sm">Low Stock</p>
                    <p class="text-2xl font-bold">{{ $lowStock ?? 5 }}</p>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg text-center">
                    <p class="text-gray-400 text-sm">Notification</p>
                    <p class="text-2xl font-bold">{{ $notifCount ?? 5 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-800 rounded-2xl p-6 shadow">
        <table class="w-full text-left">
            <thead class="text-gray-400 border-b border-gray-700">
                <tr>
                    <th class="py-2 hidden">No</th>
                    <th class="py-2">Spare Part</th>
                    <th class="py-2">Kode Part</th>
                    <th class="py-2">Jenis</th>
                    <th class="py-2">Stok</th>
                    <th class="py-2">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($spareparts as $part)
                <tr class="border-b border-gray-700 hover:bg-gray-700/30">
                    <td class="py-2 hidden">{{ $part->id_sparepart  }}</td>
                    <td class="py-2">{{ $part->nama_sparepart }}</td>
                    <td class="py-2">{{ $part->kode_sparepart }}</td>
                    <td class="py-2">{{ $part->jenis }}</td>
                    <td class="py-2">{{ $part->stok }}</td>
                    <td class="py-2">{{ $part->harga }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
