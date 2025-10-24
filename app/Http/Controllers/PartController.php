<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Category;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $parts = Part::with('category')
            ->when($q, fn($query) => $query->where('name', 'like', "%{$q}%")->orWhere('sku', 'like', "%{$q}%"))
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('parts.index', compact('parts', 'q'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('parts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => 'required|string|unique:parts,sku',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string',
        ]);

        Part::create($data);

        return redirect()->route('parts.index')->with('success', 'Part created');
    }

    public function show(Part $part)
    {
        $part->load('category');
        return view('parts.show', compact('part'));
    }

    public function edit(Part $part)
    {
        $categories = Category::orderBy('name')->get();
        return view('parts.edit', compact('part', 'categories'));
    }

    public function update(Request $request, Part $part)
    {
        $data = $request->validate([
            'sku' => 'required|string|unique:parts,sku,' . $part->id,
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string',
        ]);

        $part->update($data);

        return redirect()->route('parts.index')->with('success', 'Part updated');
    }

    public function destroy(Part $part)
    {
        $part->delete();
        return redirect()->route('parts.index')->with('success', 'Part deleted');
    }
}
