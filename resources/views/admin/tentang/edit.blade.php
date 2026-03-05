@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Edit Konten Tentang Kami</h5>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('tentang.update', $tentang) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Utama</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul', $tentang->judul) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subjudul (Paragraf Atas)</label>
                        <input type="text" name="subjudul" class="form-control"
                            value="{{ old('subjudul', $tentang->subjudul) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi (Paragraf Bawah)</label>
                        <textarea name="deskripsi" class="form-control"
                            rows="5">{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teks Tombol</label>
                        <input type="text" name="tekstombol" class="form-control"
                            value="{{ old('tekstombol', $tentang->tekstombol) }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gambar Utama</label>
                            <input type="file" name="gambar" class="form-control mb-2">
                            @if($tentang->gambar)
                                <img src="{{ asset('storage/' . $tentang->gambar) }}" class="rounded shadow-sm" width="150">
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ikon / Logo Keunggulan</label>
                            <input type="file" name="logo" class="form-control mb-2">
                            @if($tentang->logo)
                                <div class="bg-dark d-inline-block p-2 rounded">
                                    <img src="{{ asset('storage/' . $tentang->logo) }}" width="40">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection