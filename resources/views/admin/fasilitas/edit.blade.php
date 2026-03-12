@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 fw-bold">Edit Fasilitas Sekitar</h5>
                        <small class="text-muted float-end">Update informasi fasilitas luar perumahan</small>
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
                                        value="{{ $fasilita->judul }}" placeholder="Contoh: Stasiun Kereta" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi / Item</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"
                                        placeholder="Tuliskan detail atau daftar item di sini..."
                                        required>{{ $fasilita->deskripsi }}</textarea>
                                    <div class="form-text text-primary">*Gunakan ENTER untuk memisahkan baris jika perlu.
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="gambar">Ikon/Gambar</label>
                                <div class="col-sm-10">
                                    <div class="mb-3 p-2 border rounded bg-light d-inline-block">
                                        <img id="img-preview" src="{{ asset('storage/' . $fasilita->gambar) }}"
                                            class="img-fluid rounded"
                                            style="max-width:150px; min-height:100px; object-fit:contain;">
                                    </div>
                                    <input type="file" name="gambar" class="form-control" id="image-input"
                                        onchange="previewImage()" accept="image/*" />
                                    <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar lama.</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start gap-2">
                                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('fasilitas.index') }}" class="btn btn-outline-secondary px-4">
                                    <i class="bx bx-arrow-back me-1"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
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