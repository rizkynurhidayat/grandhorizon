<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Akan otomatis membuat folder 'fasilitas' di dalam storage/app/public
            $validator['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        Fasilitas::create($validator);

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil ditambahkan!');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $validator = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
                Storage::disk('public')->delete($fasilitas->gambar);
            }
            // Simpan gambar baru ke folder fasilitas
            $validator['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        $fasilitas->update($validator);

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil diperbarui!');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        // Hapus file gambar dari storage sebelum hapus data di database
        if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }

        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil dihapus!');
    }
}