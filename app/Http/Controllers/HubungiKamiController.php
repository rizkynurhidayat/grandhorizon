<?php

namespace App\Http\Controllers;

// WAJIB tambahkan ini agar $request berfungsi
use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    // Menampilkan daftar pesan masuk
    public function index()
    {
        // Menggunakan latest() agar pesan terbaru muncul paling atas
        $messages = HubungiKami::latest()->paginate(10);

        return view('admin.form.index', compact('messages'));
    }

    // Menghapus pesan
    public function destroy($id)
    {
        $message = HubungiKami::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.hubungi-kami.index')->with('success', 'Pesan berhasil dihapus.');
    }

    // Menyimpan pesan dari halaman depan
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'user' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'tanggal' => 'required|date',
            'pesan' => 'required|string',
        ]);

        // 2. Simpan ke Database
        // Karena sudah ada 'use App\Models\HubungiKami' di atas,
        // tidak perlu pakai path lengkap lagi.
        HubungiKami::create([
            'user' => $request->user,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'tanggal' => $request->tanggal,
            'pesan' => $request->pesan,
        ]);

        // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success_pesan', 'Jadwal kunjungan berhasil dikirim! Kami akan menghubungi Anda segera.');
    }
}
