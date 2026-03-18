<?php

namespace App\Http\Controllers;

use App\Models\FasilitasPerumahan;
use App\Models\Testimoni;
use App\Models\TipeRumah;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru agar muncul di daftar admin
        $testimonis = Testimoni::orderBy('created_at', 'desc')->get();

        return view('admin.testimoni.index', [
            'testimonis' => $testimonis,
            'tipeRumahCount' => TipeRumah::count(),
            'fasilitasPerumahanCount' => FasilitasPerumahan::count(),
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'user' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'pesan' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Buat Objek Baru (Cara ini lebih aman jika fillable bermasalah)
        $testimoni = new Testimoni;
        $testimoni->user = $request->user;
        $testimoni->rating = $request->rating;
        $testimoni->pesan = $request->pesan;

        // 3. Proses Upload Foto
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');

            // GUNAKAN INI: time() + hashName() agar nama file unik, acak,
            // dan bebas dari karakter aneh/spasi yang merusak URL browser.
            $nama_file = time().'_'.$file->hashName();

            // Pastikan folder public/assets/img/testimoni sudah kamu buat manual
            $file->move(public_path('assets/img/testimoni'), $nama_file);
            $testimoni->profile = $nama_file;
        }
        // 4. Simpan ke Database
        $testimoni->save();

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus file foto dari folder agar tidak menumpuk
        if ($testimoni->profile && file_exists(public_path('assets/img/testimoni/'.$testimoni->profile))) {
            unlink(public_path('assets/img/testimoni/'.$testimoni->profile));
        }

        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
