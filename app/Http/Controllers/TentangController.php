<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function edit()
    {
        // Ambil data pertama atau buat objek kosong jika belum ada data di DB
        $tentang = Tentang::first() ?? new Tentang;
        

        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
       $validator = $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'logo' => 'nullable|image|max:1024',
        ]);

        // $tentang = Tentang::first();
        // $data = $request->only(['judul', 'subjudul', 'deskripsi', 'tekstombol']);

        if ($request->hasFile('gambar')) {
            if ( $tentang->gambar && Storage::disk('public')->exists($tentang->gambar)) {
                Storage::disk('public')->delete($tentang->gambar);
            }
            $validator['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        if ($request->hasFile('logo')) {
            if ( $tentang->logo && Storage::disk('public')->exists($tentang->logo)) {
                Storage::disk('public')->delete($tentang->logo);
            }
            $validator['logo'] = $request->file('logo')->store('tentang/icons', 'public');
        }

        // Tentang::Update( $data);
        $tentang->update($validator);

        return redirect()->back()->with('success', 'Data Tentang berhasil diperbarui!');
    }
}
