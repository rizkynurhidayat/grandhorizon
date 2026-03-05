<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function edit()
    {
        $tentang = Tentang::first() ?? new Tentang;
        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
        // 1. Validasi semua input (termasuk kolom baru & tekstombol)
        $rules = [
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'tekstombol' => 'nullable', // Tambahkan ini agar tekstombol ikut tersimpan
            'gambar' => 'nullable|image|max:2048',
            'logo' => 'nullable|image|max:1024',
        ];

        // Tambahkan validasi otomatis untuk 4 keunggulan agar tidak capek ngetik satu-satu
        for ($i = 1; $i <= 4; $i++) {
            $rules["judul_unggulan_$i"] = 'nullable|string';
            $rules["desc_unggulan_$i"] = 'nullable|string';
            $rules["logo_unggulan_$i"] = 'nullable|file|mimes:jpeg,png,jpg,gif,svg,ico,webp|max:2048';
        }

        $validatedData = $request->validate($rules);

        // 2. Handle Gambar Utama
        if ($request->hasFile('gambar')) {
            if ($tentang->gambar && Storage::disk('public')->exists($tentang->gambar)) {
                Storage::disk('public')->delete($tentang->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        // 3. Handle Logo Utama
        if ($request->hasFile('logo')) {
            if ($tentang->logo && Storage::disk('public')->exists($tentang->logo)) {
                Storage::disk('public')->delete($tentang->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('tentang/icons', 'public');
        }

        // 4. Handle 4 Logo Keunggulan (Looping)
        for ($i = 1; $i <= 4; $i++) {
            $key = "logo_unggulan_$i";
            if ($request->hasFile($key)) {
                if ($tentang->$key && Storage::disk('public')->exists($tentang->$key)) {
                    Storage::disk('public')->delete($tentang->$key);
                }
                $validatedData[$key] = $request->file($key)->store('tentang/keunggulan', 'public');
            }
        }

        // 5. Update SEMUA data yang sudah tervalidasi
        $tentang->update($validatedData);

        return redirect()->back()->with('success', 'Data Tentang berhasil diperbarui!');
    }
}