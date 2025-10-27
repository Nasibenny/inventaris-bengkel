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
            'name' => 'required|string|max:255',
            'part_number' => 'required|string|max:100',
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:50',
        ]);

        SparePart::create([
            'name' => $request->name,
            'part_number' => $request->part_number,
            'quantity' => $request->quantity,
            'location' => $request->location,
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
            'name' => 'required|string|max:255',
            'part_number' => 'required|string|max:100',
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:50',
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
