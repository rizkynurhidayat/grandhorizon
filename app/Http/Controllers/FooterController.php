<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::latest()->get();
        $active  = Footer::getActive();
        return view('admin.footer.index', compact('footers', 'active'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address'      => 'required|string|max:255',
            'phone'        => 'required|string|max:50',
            'email'        => 'required|email|max:100',
            'copyright'    => 'required|string|max:150',
            'fb_name'      => 'nullable|string|max:100',
            'fb_url'       => 'nullable|url|max:255',
            'tw_name'      => 'nullable|string|max:100',
            'tw_url'       => 'nullable|url|max:255',
            'ig_name'      => 'nullable|string|max:100',
            'ig_url'       => 'nullable|url|max:255',
            'biaya_judul'  => 'nullable|string|max:255',
            'biaya_items'  => 'nullable|array',
            'biaya_items.*'=> 'nullable|string|max:255',
        ]);

        // Filter item kosong
        $validated['biaya_items'] = array_values(
            array_filter($request->input('biaya_items', []), fn($v) => trim($v) !== '')
        );

        Footer::query()->update(['is_active' => false]);
        Footer::create(array_merge($validated, ['is_active' => true]));

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil ditambahkan!');
    }

    public function edit(Footer $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $validated = $request->validate([
            'address'      => 'required|string|max:255',
            'phone'        => 'required|string|max:50',
            'email'        => 'required|email|max:100',
            'copyright'    => 'required|string|max:150',
            'fb_name'      => 'nullable|string|max:100',
            'fb_url'       => 'nullable|url|max:255',
            'tw_name'      => 'nullable|string|max:100',
            'tw_url'       => 'nullable|url|max:255',
            'ig_name'      => 'nullable|string|max:100',
            'ig_url'       => 'nullable|url|max:255',
            'biaya_judul'  => 'nullable|string|max:255',
            'biaya_items'  => 'nullable|array',
            'biaya_items.*'=> 'nullable|string|max:255',
        ]);

        // Filter item kosong
        $validated['biaya_items'] = array_values(
            array_filter($request->input('biaya_items', []), fn($v) => trim($v) !== '')
        );

        $footer->update($validated);

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil diperbarui!');
    }

    public function activate(Footer $footer)
    {
        Footer::query()->update(['is_active' => false]);
        $footer->update(['is_active' => true]);

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil diaktifkan!');
    }

    public function destroy(Footer $footer)
    {
        $footer->delete();

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer berhasil dihapus!');
    }
}