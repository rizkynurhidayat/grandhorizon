@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Fasilitas</h5>
                        {{-- Tombol kembali di sini sudah dihapus agar lebih clean --}}
                    </div>
                    <div class="card-body">
                        <form id="formEditFasilitas" action="{{ route('fasilitas.update', $fasilita->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="judul">Judul Fasilitas</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        value="{{ $fasilita->judul }}" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="deskripsi">Daftar Item</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"
                                        required>{{ $fasilita->deskripsi }}</textarea>
                                    <div class="form-text text-primary">*Gunakan ENTER untuk memisahkan item.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="gambar">Ikon/Gambar</label>
                                <div class="col-sm-10">
                                    <div class="mb-3">
                                        <img id="img-preview" src="{{ asset('storage/' . $fasilita->gambar) }}"
                                            class="img-fluid rounded" style="max-width:150px; background:#f5f5f5;">
                                    </div>
                                    <input type="file" name="gambar" class="form-control" id="image-input"
                                        onchange="previewImage()" />
                                    <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" form="formEditFasilitas" class="btn btn-primary shadow-sm">
                        <i class="bx bx-save me-1"></i> Update Data
                    </button>
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-outline-secondary shadow-sm">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image-input');
            const imgPreview = document.querySelector('#img-preview');

            if (image.files && image.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPreview.src = e.target.result;
                }
                reader.readAsDataURL(image.files[0]);
            }
        }
    </script>
@endsection