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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/fasilitas', $gambar->hashName());

        Fasilitas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar->hashName(),
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/fasilitas', $gambar->hashName());
            Storage::delete('public/fasilitas/' . $fasilitas->gambar);

            $fasilitas->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambar->hashName(),
            ]);
        } else {
            $fasilitas->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Diupdate!');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        Storage::delete('public/fasilitas/' . $fasilitas->gambar);
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Dihapus!');
    }
}