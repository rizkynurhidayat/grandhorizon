@extends('admin.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Edit Konten Hero Section</h5>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-check-circle me-2"></i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Judul Utama</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $hero->judul) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Subjudul</label>
                    <input type="text" name="subjudul" class="form-control" value="{{ old('subjudul', $hero->subjudul) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat / Lokasi</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $hero->alamat) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Teks Tombol (CTA)</label>
                    <input type="text" name="tekstombol" class="form-control" value="{{ old('tekstombol', $hero->tekstombol) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Background</label>
                    <input type="file" name="gambar" class="form-control mb-2">
                    <div class="d-flex align-items-center mt-2">
                        @if($hero->gambar)
                            <div class="me-3">
                                <small class="text-muted d-block mb-1">Preview saat ini:</small>
                                <img src="{{ asset('assets/img/hero/' . $hero->gambar) }}" alt="Hero Background" style="width: 150px; border-radius: 8px; border: 1px solid #ddd;">
                            </div>
                        @endif
                        <small class="text-muted">Format: JPG, PNG, JPEG. Kosongkan jika tidak ingin mengganti gambar.</small>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bx bx-save me-1"></i> Update Hero Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection