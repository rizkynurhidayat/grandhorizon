@extends('admin.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> {{-- Tambah justify-content-center biar di tengah --}}
        <div class="col-md-10"> {{-- Pakai col-md-10 supaya gak terlalu lebar nabrak sidebar --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold">Tambah Fasilitas Baru</h5>
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-sm btn-secondary">
                         Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Judul Fasilitas --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="judul">Judul Fasilitas</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul" class="form-control" id="judul"
                                    placeholder="Contoh: Akses Jalan / Pendidikan" required />
                            </div>
                        </div>

                        {{-- Daftar Item --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="deskripsi">Daftar Item</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"
                                    placeholder="Gunakan ENTER untuk baris baru:&#10;Stasiun Serang (4km)&#10;Gerbang Tol (1km)"
                                    required></textarea>
                                <div class="form-text text-primary">
                                    *Setiap baris baru akan otomatis menjadi poin list di halaman utama.
                                </div>
                            </div>
                        </div>

                        {{-- Ikon/Gambar --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="gambar">Ikon/Gambar</label>
                            <div class="col-sm-9">
                                <input type="file" name="gambar" class="form-control mb-2" id="image-input"
                                    onchange="previewImage()" required accept="image/*" />
                                <div id="preview-container">
                                    <img id="img-preview" class="img-fluid rounded shadow-sm"
                                        style="display:none; max-width:150px; background:#f5f5f5; border: 1px solid #ddd;" />
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Simpan --}}
                        <div class="row justify-content-end mt-4">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-4">
                                    Simpan Data
                                </button>
                            </div>
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
                imgPreview.style.display = 'block';
            }
            reader.readAsDataURL(image.files[0]);
        }
    }
</script>
@endsection