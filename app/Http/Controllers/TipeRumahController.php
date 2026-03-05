<?php

namespace App\Http\Controllers;

use App\Models\TipeRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipeRumahController extends Controller
{
    public function index()
    {
        $tipeRumah = TipeRumah::latest()->get();

        return view('admin.tiperumah.index', compact('tipeRumah'));
    }

    public function create()
    {
        return view('admin.tiperumah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe_rumah' => 'required',
            'luas_bangunan' => 'required',
            'harga' => 'required', // String agar bisa input rentang (Rp 1M - 2M)
            'cicilan' => 'required',
            'kamar_tidur' => 'required|numeric',
            'kamar_mandi' => 'required|numeric',
            'garasi' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tekstombol' => 'required',
        ]);

        $gambarPath = $request->file('gambar')->store('tiperumah', 'public');

        TipeRumah::create([
            'nama_tipe_rumah' => $request->nama_tipe_rumah,
            'luas_bangunan' => $request->luas_bangunan,
            'harga' => $request->harga,
            'cicilan' => $request->cicilan,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
            'garasi' => $request->garasi,
            'gambar' => $gambarPath,
            'tekstombol' => $request->tekstombol,
        ]);

        return redirect()->route('tiperumah.index')->with('success', 'Tipe rumah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $t = TipeRumah::findOrFail($id);

        return view('admin.tiperumah.edit', compact('t'));
    }

    public function update(Request $request, $id)
    {
        $t = TipeRumah::findOrFail($id);

        $request->validate([
            'nama_tipe_rumah' => 'required',
            'kamar_tidur' => 'required|numeric',
            'kamar_mandi' => 'required|numeric',
            'garasi' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($t->gambar);
            $data['gambar'] = $request->file('gambar')->store('tiperumah', 'public');
        }

        $t->update($data);

        return redirect()->route('tiperumah.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $t = TipeRumah::findOrFail($id);
        Storage::disk('public')->delete($t->gambar);
        $t->delete();

        return redirect()->route('tiperumah.index')->with('success', 'Data berhasil dihapus!');
    }
}
