<?php

namespace App\Http\Controllers;

use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    public function index()
    {
        $messages = HubungiKami::latest()->paginate(10);
        return view('admin.form.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = HubungiKami::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.hubungi-kami.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user'    => 'required|string|max:255',
            'no_hp'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'tanggal' => 'required|date',
            'pesan'   => 'required|string',
        ]);

        HubungiKami::create([
            'user'    => $request->user,
            'no_hp'   => $request->no_hp,
            'email'   => $request->email,
            'tanggal' => $request->tanggal,
            'pesan'   => $request->pesan,
        ]);

        return redirect()->back()->with('success_pesan', 'Jadwal kunjungan berhasil dikirim! Kami akan menghubungi Anda segera.');
    }

    public function markAsRead($id)
    {
        HubungiKami::findOrFail($id)->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }
}