<?php

namespace App\Http\Controllers;

use App\Models\Tentang; // Import Model Tentang
use Illuminate\Http\Request; // Untuk menangani request dari form
use Illuminate\Support\Facades\Storage; // Untuk menyimpan file ke storage/app/public
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File; //untuk hapus file lama

class TentangController extends Controller
{
    // 1. Menampilkan halaman index dengan data tentang
    public function index() {
        $tentangs = Tentang::all();
        return view('admin.tentang.index', compact('tentangs'));
    }
    // 2. Menampilkan halaman create
    public function create() {
        return view('admin.tentang.create');
    }
    //3. Menyimpan data baru ke database
    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'logo' => 'required|image|max:1024',
        ]);

        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('tentang', 'public');
        $data['logo'] = $request->file('logo')->store('tentang/icons', 'public');

        Tentang::create($data);
        return redirect()->route('tentang.index')->with('success', 'Data berhasil dibuat');
    }
    // 4. Menampilkan halaman edit dengan data yang ingin diedit
    public function edit(Tentang $tentang) {
        return view('admin.tentang.edit', compact('tentang'));
    }
    // 5. Menyimpan perubahan data ke database
    public function update(Request $request, Tentang $tentang) {
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($tentang->gambar) Storage::disk('public')->delete($tentang->gambar);
            $data['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($tentang->logo) Storage::disk('public')->delete($tentang->logo);
            $data['logo'] = $request->file('logo')->store('tentang/icons', 'public');
        }

        // BARIS INI WAJIB ADA AGAR TERSIMPAN
        $tentang->update($data);

        return redirect()->route('tentang.index')->with('success', 'Data berhasil diupdate');
    }
    // 6. Menghapus data dari database
    public function destroy(Tentang $tentang) {
        if ($tentang->gambar) Storage::disk('public')->delete($tentang->gambar);
        if ($tentang->logo) Storage::disk('public')->delete($tentang->logo);
        $tentang->delete();
        return redirect()->route('tentang.index');
    }
}