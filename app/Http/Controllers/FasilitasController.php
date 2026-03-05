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

    /**
     * Menampilkan daftar fasilitas di halaman admin
     */
    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();

        // Pastikan mengarah ke folder admin/fasilitas
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Menampilkan form tambah fasilitas
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

<<<<<<< HEAD
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
=======
    /**
     * Menyimpan data fasilitas baru ke database
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Simpan ke folder public/fasilitas
            $data['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        Fasilitas::create($data);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit fasilitas
     */
    public function edit(Fasilitas $fasilita)
    {
        // Variabel $fasilita harus sama dengan yang dipanggil di edit.blade.php
        return view('admin.fasilitas.edit', compact('fasilita'));
    }

    /**
     * Memperbarui data fasilitas di database
     */
    public function update(Request $request, Fasilitas $fasilita)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
>>>>>>> ca64be5e9ad65b844b902bac85d3b9f4180f7825
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
<<<<<<< HEAD
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
=======
            if ($fasilita->gambar) {
                Storage::disk('public')->delete($fasilita->gambar);
            }
            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }

        $fasilita->update($data);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diupdate!');
    }

    /**
     * Menghapus data fasilitas dari database
     */
    public function destroy(Fasilitas $fasilita)
    {
        // Hapus file gambar dari storage sebelum datanya dihapus
        if ($fasilita->gambar) {
            Storage::disk('public')->delete($fasilita->gambar);
        }

        $fasilita->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}
>>>>>>> ca64be5e9ad65b844b902bac85d3b9f4180f7825
