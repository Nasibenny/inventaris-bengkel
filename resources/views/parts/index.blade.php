@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-lg font-medium text-white">Parts</h1>
        <form method="get" action="{{ route('parts.index') }}" class="flex items-center gap-2">
            <input name="q" value="{{ $q ?? '' }}" placeholder="Search by name or SKU" class="border  text-white p-2 rounded-sm text-sm" />
            <button class="px-3 py-2 bg-[#1b1b18] text-white rounded-sm text-sm">Search</button>
        </form>
    </div>

    <div class="overflow-x-auto bg-white border border-[#e3e3e0] rounded-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left">
                    <th class="p-3">SKU</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Qty</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($parts as $part)
                    <tr class="border-t">
                        <td class="p-3">{{ $part->sku }}</td>
                        <td class="p-3">{{ $part->name }}</td>
                        <td class="p-3">{{ $part->category->name ?? '-' }}</td>
                        <td class="p-3">{{ $part->quantity }}</td>
                        <td class="p-3">{{ number_format($part->price, 2) }}</td>
                        <td class="p-3">
                            <a href="{{ route('parts.show', $part) }}" class="text-sm underline">View</a>
                            <a href="{{ route('parts.edit', $part) }}" class="text-sm underline ml-2">Edit</a>
                            <form action="{{ route('parts.destroy', $part) }}" method="post" style="display:inline-block" onsubmit="return confirm('Delete this part?')">
                                @csrf @method('delete')
                                <button type="submit" class="text-sm underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4">No parts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $parts->links() }}
    </div>
@endsection
