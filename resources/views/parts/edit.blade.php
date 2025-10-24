@extends('layouts.app')

@section('content')
    <h1 class="text-lg font-medium mb-4">Edit Part</h1>

    <form method="post" action="{{ route('parts.update', $part) }}" class="bg-white border p-4 rounded-sm max-w-xl">
        @csrf
        @method('put')
        <div class="grid gap-3">
            <label class="text-sm">SKU
                <input name="sku" value="{{ old('sku', $part->sku) }}" class="w-full border p-2 rounded-sm" />
            </label>
            <label class="text-sm">Name
                <input name="name" value="{{ old('name', $part->name) }}" class="w-full border p-2 rounded-sm" />
            </label>
            <label class="text-sm">Description
                <textarea name="description" class="w-full border p-2 rounded-sm">{{ old('description', $part->description) }}</textarea>
            </label>
            <label class="text-sm">Category
                <select name="category_id" class="w-full border p-2 rounded-sm">
                    <option value="">-- none --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @if(old('category_id', $part->category_id) == $c->id) selected @endif>{{ $c->name }}</option>
                    @endforeach
                </select>
            </label>
            <div class="grid grid-cols-2 gap-3">
                <label class="text-sm">Quantity
                    <input type="number" name="quantity" value="{{ old('quantity', $part->quantity) }}" class="w-full border p-2 rounded-sm" />
                </label>
                <label class="text-sm">Price
                    <input type="number" step="0.01" name="price" value="{{ old('price', $part->price) }}" class="w-full border p-2 rounded-sm" />
                </label>
            </div>
            <label class="text-sm">Location
                <input name="location" value="{{ old('location', $part->location) }}" class="w-full border p-2 rounded-sm" />
            </label>

            <div class="pt-2">
                <button class="px-4 py-2 bg-[#1b1b18] text-white rounded-sm">Update</button>
                <a href="{{ route('parts.index') }}" class="ml-2 text-sm underline">Cancel</a>
            </div>
        </div>
    </form>
@endsection
