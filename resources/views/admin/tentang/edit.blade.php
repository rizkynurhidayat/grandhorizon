@extends('admin.dashboard')

@section('content')
<div class="container-fluid mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tentang.index') }}">Tentang</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>
    </nav>

    <div class="card shadow border-0">
        <div class="card-header bg-warning py-3">
            <h5 class="mb-0 text-dark fw-bold">Ubah Konten "Tentang Kami"</h5>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Judul Utama</label>
                        <input type="text" name="judul" class="form-control" value="{{ $tentang->judul }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Subjudul</label>
                        <input type="text" name="subjudul" class="form-control" value="{{ $tentang->subjudul }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi Lengkap</label>
                    <textarea name="deskripsi" class="form-control" rows="6" required>{{ $tentang->deskripsi }}</textarea>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold d-block">Gambar Utama (Project)</label>
                        <img src="{{ asset('storage/' . $tentang->gambar) }}" class="img-thumbnail mb-2" style="max-height: 150px">
                        <input type="file" name="gambar" class="form-control">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold d-block">Ikon / Logo Kecil</label>
                        <div class="p-2 bg-dark d-inline-block rounded mb-2">
                            <img src="{{ asset('storage/' . $tentang->logo) }}" width="40">
                        </div>
                        <input type="file" name="logo" class="form-control">
                        <small class="text-muted">Upload ikon baru untuk mengganti.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Teks pada Tombol</label>
                    <input type="text" name="tekstombol" class="form-control" value="{{ $tentang->tekstombol }}">
                </div>

                <div class="mt-4 border-top pt-4">
                    <button type="submit" class="btn btn-primary px-5">Simpan Perubahan</button>
                    <a href="{{ route('tentang.index') }}" class="btn btn-outline-secondary px-5">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection