@extends('layouts.app')

@section('title', 'Transaction Detail')

@section('content')
<div class="text-white">
    {{-- Judul --}}
    <h1 class="text-2xl font-semibold mb-6">Transaction Detail</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-600/20 border border-green-500 text-green-300 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- Informasi Umum --}}
    <div class="bg-[#1b1c21] border border-gray-700 rounded-xl p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4 text-yellow-400">Transaction Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <p><span class="text-gray-400">Invoice:</span> {{ $transaction->kode_invoice }}</p>
            <p><span class="text-gray-400">Customer:</span> {{ $transaction->customer->nama ?? '-' }}</p>
            <p><span class="text-gray-400">Status:</span>
                <span class="capitalize text-yellow-400">{{ $transaction->status }}</span>
            </p>
            <p><span class="text-gray-400">Handled by:</span> {{ $transaction->user->nama ?? '-' }}</p>
            <p><span class="text-gray-400">Date In:</span> {{ $transaction->tgl_masuk }}</p>
            @if($transaction->tgl_selesai)
                <p><span class="text-gray-400">Date Out:</span> {{ $transaction->tgl_selesai }}</p>
            @endif
        </div>
    </div>

    {{-- Daftar Sparepart --}}
    <div class="bg-[#1b1c21] border border-gray-700 rounded-xl p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4 text-yellow-400">Used Spareparts</h2>

        <table class="w-full text-sm border-collapse">
            <thead>
                <tr class="text-gray-400 border-b border-gray-600">
                    <th class="py-2 text-left">Sparepart</th>
                    <th class="py-2 text-center">Qty</th>
                    <th class="py-2 text-center">Price</th>
                    <th class="py-2 text-center">Subtotal</th>
                    <th class="py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaction->details as $detail)
                    <tr class="border-b border-gray-700 hover:bg-[#2a2b31]">
                        <td class="py-2">{{ $detail->sparepart->nama_sparepart ?? '-' }}</td>
                        <td class="py-2 text-center">{{ $detail->qty }}</td>
                        <td class="py-2 text-center">Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="py-2 text-center text-yellow-400">
                            Rp{{ number_format($detail->qty * $detail->harga, 0, ',', '.') }}
                        </td>
                        <td class="py-2 text-center">
                            <form action="{{ route('transactions.deleteDetail', [$transaction->id_service, $detail->id_detail]) }}"
                                  method="POST" onsubmit="return confirm('Delete this sparepart?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-3 text-center text-gray-400">No sparepart used yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tambah Sparepart --}}
    <div class="bg-[#1b1c21] border border-gray-700 rounded-xl p-6 mb-6">
        <h2 class="text-lg font-semibold mb-4 text-yellow-400">Add Sparepart</h2>

        <form action="{{ route('transactions.addDetail', $transaction->id_service) }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf
            <div>
                <label class="text-sm text-gray-400">Sparepart</label>
                <select name="id_sparepart" class="w-full bg-[#2a2b31] border border-gray-600 rounded-md p-2 text-white">
                    <option value="">-- Select Sparepart --</option>
                    @foreach(\App\Models\SparePart::all() as $part)
                        <option value="{{ $part->id_sparepart }}">{{ $part->nama_sparepart }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-400">Quantity</label>
                <input type="number" name="qty" min="1" class="w-full bg-[#2a2b31] border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div>
                <label class="text-sm text-gray-400">Description</label>
                <input type="text" name="keterangan" placeholder="Optional" class="w-full bg-[#2a2b31] border border-gray-600 rounded-md p-2 text-white">
            </div>

            <div class="md:col-span-3 flex justify-end">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded-md">
                    Add Sparepart
                </button>
            </div>
        </form>
    </div>

    {{-- Update Status --}}
    <div class="bg-[#1b1c21] border border-gray-700 rounded-xl p-6">
        <h2 class="text-lg font-semibold mb-4 text-yellow-400">Update Transaction Status</h2>

        <form action="{{ route('transactions.updateStatus', $transaction->id_service) }}" method="POST" class="flex items-center gap-4">
            @csrf
            <select name="status" class="bg-[#2a2b31] border border-gray-600 rounded-md p-2 text-white">
                <option value="baru" {{ $transaction->status == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="dalam proses" {{ $transaction->status == 'dalam proses' ? 'selected' : '' }}>Dalam Proses</option>
                <option value="selesai" {{ $transaction->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="diambil" {{ $transaction->status == 'diambil' ? 'selected' : '' }}>Diambil</option>
            </select>

            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded-md">
                Update
            </button>
        </form>
    </div>
</div>
@endsection
