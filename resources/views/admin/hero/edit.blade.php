@use('Illuminate\Support\Facades\Storage')
@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Edit Konten Hero Section</h5>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bx bx-check-circle me-2"></i>
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Judul Utama</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul', $hero->judul) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Subjudul</label>
                            <input type="text" name="subjudul" class="form-control"
                                value="{{ old('subjudul', $hero->subjudul) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Alamat / Lokasi</label>
                            <input type="text" name="alamat" class="form-control"
                                value="{{ old('alamat', $hero->alamat) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Teks Tombol (CTA)</label>
                            <input type="text" name="tekstombol" class="form-control"
                                value="{{ old('tekstombol', $hero->tekstombol) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Background</label>
                        <input type="file" name="gambar" id="inputGambar" class="form-control mb-2" accept="image/*">
                        <small class="text-muted d-block mb-3">Maksimal ukuran gambar: 2MB.</small>

                        {{-- Bagian Preview yang disamakan dengan Fasilitas Perumahan --}}
                        <div class="mt-3">
                            <small class="text-muted d-block mb-2">Preview Gambar saat ini:</small>
                            <div class="p-2 border rounded bg-light d-inline-block">
                                <img id="previewHero"
                                    src="{{ $hero->gambar && $hero->gambar !== 'default.jpg' ? Storage::url($hero->gambar) : asset('assets/img/hero/default.jpg') }}"
                                    alt="Hero Preview" class="rounded border shadow-sm"
                                    style="max-width: 300px; height: auto; display: block;">
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="bx bx-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('inputGambar').onchange = function (evt) {
            const [file] = this.files;
            if (file) {
                document.getElementById('previewHero').src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection