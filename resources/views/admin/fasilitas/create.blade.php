@extends('admin.dashboard')

@section('content')
<<<<<<< HEAD
<div class="container">
    <h2>Tambah Fasilitas Baru</h2>
    <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Contoh: Sekolah">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Contoh: SMAN 1 Serang (4,3 km)"></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Icon</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
=======
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Fasilitas Baru</h5>
                        <a href="{{ route('fasilitas.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="judul">Judul Fasilitas</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        placeholder="Contoh: Akses Jalan" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="deskripsi">Daftar Item</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"
                                        placeholder="Gunakan ENTER untuk baris baru:&#10;Stasiun Serang (4km)&#10;Gerbang Tol (1km)"
                                        required></textarea>
                                    <div class="form-text text-primary">*Setiap baris baru akan otomatis menjadi poin list
                                        di halaman utama.</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="gambar">Ikon/Gambar</label>
                                <div class="col-sm-10">
                                    <img id="img-preview" class="img-fluid rounded mb-3"
                                        style="display:none; max-width:150px; background:#f5f5f5;" />
                                    <input type="file" name="gambar" class="form-control" id="image-input"
                                        onchange="previewImage()" required />
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
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
>>>>>>> ca64be5e9ad65b844b902bac85d3b9f4180f7825
@endsection