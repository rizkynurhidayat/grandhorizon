<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request; // Import Model HeroSection
use Illuminate\Support\Facades\File; // Untuk menghapus gambar lama jika ada

class HeroSectionController extends Controller
{
    // 1. Menampilkan halaman edit
    public function edit()
    {
        $hero = HeroSection::firstOrCreate(
            ['id' => 1],
            [
                'judul' => 'Judul Default',
                'subjudul' => 'Subjudul Default',
                'alamat' => '-',
                'tekstombol' => 'Klik Disini',
                'gambar' => 'default.jpg', // JANGAN null, kasih string kosong atau nama file
            ]
        );

        return view('admin.hero.edit', compact('hero'));
    }

    // 2. Menyimpan perubahan data
    public function update(Request $request)
    {
        // Validasi input sesuai dengan kolom di Model
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'alamat' => 'required',
            'tekstombol' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        $hero = HeroSection::first();

        // Siapkan data untuk diupdate
        $data = [
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'alamat' => $request->alamat,
            'tekstombol' => $request->tekstombol,
        ];

        // Logika jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari folder jika bukan gambar default
            if ($hero->gambar && File::exists(public_path('assets/img/hero/'.$hero->gambar))) {
                File::delete(public_path('assets/img/hero/'.$hero->gambar));
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/img/hero'), $nama_file);

            // Masukkan nama file baru ke array data
            $data['gambar'] = $nama_file;
        }

        // Eksekusi update ke database
        $hero->update($data);

        return redirect()->back()->with('success', 'Hero Section berhasil diperbarui!');
    }
}
