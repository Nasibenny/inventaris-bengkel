@extends('layouts.app')

@section('content')
    <h1 class="text-lg font-medium mb-4">Add Part</h1>

    <form method="post" action="{{ route('parts.store') }}" class="bg-white border p-4 rounded-sm max-w-xl">
        @csrf
        <div class="grid gap-3">
            <label class="text-sm">SKU
                <input name="sku" value="{{ old('sku') }}" class="w-full border p-2 rounded-sm" />
            </label>
            <label class="text-sm">Name
                <input name="name" value="{{ old('name') }}" class="w-full border p-2 rounded-sm" />
            </label>
            <label class="text-sm">Description
                <textarea name="description" class="w-full border p-2 rounded-sm">{{ old('description') }}</textarea>
            </label>
            <label class="text-sm">Category
                <select name="category_id" class="w-full border p-2 rounded-sm">
                    <option value="">-- none --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </label>
            <div class="grid grid-cols-2 gap-3">
                <label class="text-sm">Quantity
                    <input type="number" name="quantity" value="{{ old('quantity', 0) }}" class="w-full border p-2 rounded-sm" />
                </label>
                <label class="text-sm">Price
                    <input type="number" step="0.01" name="price" value="{{ old('price', '0.00') }}" class="w-full border p-2 rounded-sm" />
                </label>
            </div>
            <label class="text-sm">Location
                <input name="location" value="{{ old('location') }}" class="w-full border p-2 rounded-sm" />
            </label>

            <div class="pt-2">
                <button class="px-4 py-2 bg-[#1b1b18] text-white rounded-sm">Create</button>
                <a href="{{ route('parts.index') }}" class="ml-2 text-sm underline">Cancel</a>
            </div>
        </div>
    </form>
@endsection
