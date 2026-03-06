<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Menampilkan daftar fasilitas di halaman admin
     */
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Menampilkan form tambah fasilitas
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Menyimpan data fasilitas baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        Fasilitas::create($data);

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit fasilitas
     */
    public function edit(Fasilitas $fasilita)
    {
        // SINKRONISASI: Kita pakai nama 'fasilita' agar cocok dengan Blade
        return view('admin.fasilitas.edit', compact('fasilita'));
    }

    /**
     * Memperbarui data fasilitas
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($fasilita->gambar) {
                Storage::disk('public')->delete($fasilita->gambar);
            }
            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        $fasilita->update($data);

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil diperbarui!');
    }

    /**
     * Menghapus data fasilitas
     */
    public function destroy(Fasilitas $fasilita)
    {
        if ($fasilita->gambar) {
            Storage::disk('public')->delete($fasilita->gambar);
        }

        $fasilita->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Data Fasilitas berhasil dihapus!');
    }
}
