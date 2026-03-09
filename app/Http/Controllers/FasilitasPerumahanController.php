<?php

namespace App\Http\Controllers;

use App\Models\FasilitasPerumahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasPerumahanController extends Controller
{
    public function index()
    {
        $fasilitas = FasilitasPerumahan::latest()->get();
        return view('admin.fasilitasperumahan.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitasperumahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'gambar' => 'required|image|max:2048',
        ]);

        $path = $request->file('gambar')->store('fasilitas_perumahan', 'public');

        FasilitasPerumahan::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'gambar' => $path,
        ]);

        return redirect()->route('fasilitasperumahan.index')->with('success', 'Fasilitas berhasil ditambah!');
    }

    // INI YANG TADI KURANG:
    public function edit($id)
    {
        $fasilitasperumahan = FasilitasPerumahan::findOrFail($id);
        return view('admin.fasilitasperumahan.edit', compact('fasilitasperumahan'));
    }

    public function update(Request $request, $id)
    {
        $fp = FasilitasPerumahan::findOrFail($id);
        
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $fp->nama_fasilitas = $request->nama_fasilitas;

        if ($request->hasFile('gambar')) {
            if ($fp->gambar) {
                Storage::disk('public')->delete($fp->gambar);
            }
            $fp->gambar = $request->file('gambar')->store('fasilitas_perumahan', 'public');
        }

        $fp->save();

        return redirect()->route('fasilitasperumahan.index')->with('success', 'Fasilitas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $fp = FasilitasPerumahan::findOrFail($id);
        Storage::disk('public')->delete($fp->gambar);
        $fp->delete();

        return redirect()->route('fasilitasperumahan.index')->with('success', 'Gambar dihapus!');
    }
}