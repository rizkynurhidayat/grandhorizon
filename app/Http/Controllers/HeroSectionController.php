<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSectionController extends Controller
{
    // 1. Menampilkan halaman edit
    public function edit()
    {
        // Menggunakan firstOrCreate agar jika data ID 1 belum ada, sistem otomatis membuatnya
        $hero = HeroSection::firstOrCreate(
            ['id' => 1],
            [
                'judul' => 'Judul Default Grand Horizon',
                'subjudul' => 'Subjudul Default',
                'alamat' => 'Lokasi Proyek',
                'tekstombol' => 'Lihat Detail',
                'gambar' => 'default.jpg',
            ]
        );

        return view('admin.hero.edit', compact('hero'));
    }

    // 2. Menyimpan perubahan data
    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subjudul' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tekstombol' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $hero = HeroSection::findOrFail(1);

        $data = [
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'alamat' => $request->alamat,
            'tekstombol' => $request->tekstombol,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada dan bukan file default
            if ($hero->gambar && $hero->gambar !== 'default.jpg' && Storage::disk('public')->exists($hero->gambar)) {
                Storage::disk('public')->delete($hero->gambar);
            }

            // Upload gambar baru dengan nama random
            $file = $request->file('gambar');
            $nama_file = Str::random(40).'.'.$file->getClientOriginalExtension();
            $data['gambar'] = $file->storeAs('hero', $nama_file, 'public');
        }

        $hero->update($data);

        return redirect()->back()->with('success', 'Konten Hero Section berhasil diperbarui!');
    }
}
