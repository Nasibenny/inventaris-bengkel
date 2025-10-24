@extends('layouts.app')

@section('content')
    <h1 class="text-lg font-medium mb-4 ">Part: {{ $part->name }}</h1>

    <div class="bg-white border p-6 rounded-sm max-w-2xl">
        <dl class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <dt class="font-medium">SKU</dt>
                <dd>{{ $part->sku }}</dd>
            </div>
            <div>
                <dt class="font-medium">Quantity</dt>
                <dd>{{ $part->quantity }}</dd>
            </div>
            <div>
                <dt class="font-medium">Category</dt>
                <dd>{{ $part->category->name ?? '-' }}</dd>
            </div>
            <div>
                <dt class="font-medium">Price</dt>
                <dd>{{ number_format($part->price, 2) }}</dd>
            </div>
            <div class="col-span-2">
                <dt class="font-medium">Description</dt>
                <dd>{{ $part->description }}</dd>
            </div>
            <div class="col-span-2">
                <dt class="font-medium">Location</dt>
                <dd>{{ $part->location }}</dd>
            </div>
        </dl>

        <div class="mt-4">
            <a href="{{ route('parts.edit', $part) }}" class="px-3 py-2 bg-[#1b1b18] text-white rounded-sm">Edit</a>
            <a href="{{ route('parts.index') }}" class="ml-2 text-sm underline">Back</a>
        </div>
    </div>
@endsection
