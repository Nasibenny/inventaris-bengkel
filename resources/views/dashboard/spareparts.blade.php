@extends('dashboard.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">Spare Parts</h1>

<div class="bg-gray-800 p-6 rounded-2xl shadow space-y-4">
    <div class="flex justify-between items-center">
        <input type="text" placeholder="Search..." class="bg-gray-700 text-gray-200 rounded-lg px-4 py-2 w-1/3 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        <a href="{{ route('spareparts.create') }}" class="bg-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-400">Add Transaction</a>
    </div>

    <table class="w-full text-left mt-4">
        <thead class="text-gray-400 border-b border-gray-700">
            <tr>
                <th class="py-2">Name</th>
                <th class="py-2">Part Number</th>
                <th class="py-2">Quantity</th>
                <th class="py-2">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spareparts as $part)
            <tr class="border-b border-gray-700 hover:bg-gray-700/30">
                <td class="py-2">{{ $part->name }}</td>
                <td class="py-2">{{ $part->partnumber }}</td>
                <td class="py-2">{{ $part->quantity }}</td>
                <td class="py-2">{{ $part->location }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
