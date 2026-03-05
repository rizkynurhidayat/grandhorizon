@extends('admin.dashboard')

@section('content')
<div class="container-fluid mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tentang.index') }}">Tentang</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>

    <div class="card shadow border-0">
        <div class="card-header bg-primary py-3">
            <h5 class="mb-0 text-white fw-bold">Tambah Data Tentang Grand Horizon</h5>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('tentang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Judul Utama</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Tentang Grand Horizon" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Subjudul</label>
                        <input type="text" name="subjudul" class="form-control" placeholder="Contoh: Hunian Nyaman dan Strategis" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5" placeholder="Jelaskan detail perumahan di sini..." required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Gambar Utama (Besar)</label>
                        <input type="file" name="gambar" class="form-control" required>
                        <small class="text-muted">Format: JPG, PNG (Max 2MB)</small>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Ikon / Logo (Kecil)</label>
                        <input type="file" name="logo" class="form-control" required>
                        <small class="text-muted">Format: PNG, SVG (Ikon Fitur)</small>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Teks Tombol</label>
                        <input type="text" name="tekstombol" class="form-control" placeholder="Contoh: Lihat Selengkapnya">
                    </div>
                </div>

                <div class="mt-4 border-top pt-4">
                    <button type="submit" class="btn btn-success px-5">
                        <i class="bx bx-save me-1"></i> Simpan Data
                    </button>
                    <a href="{{ route('tentang.index') }}" class="btn btn-outline-secondary px-5">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection