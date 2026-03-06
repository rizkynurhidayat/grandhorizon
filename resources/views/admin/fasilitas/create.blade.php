@extends('admin.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold">Tambah Fasilitas Baru</h5>
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-sm btn-secondary">
                        <i class='bx bx-arrow-back'></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="judul">Judul Fasilitas</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" class="form-control" id="judul"
                                    placeholder="Contoh: Akses Jalan / Pendidikan" required />
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
                                <div class="mb-3">
                                    <img id="img-preview" class="img-fluid rounded shadow-sm"
                                        style="display:none; max-width:150px; background:#f5f5f5; border: 1px solid #ddd;" />
                                </div>
                                <input type="file" name="gambar" class="form-control" id="image-input"
                                    onchange="previewImage()" required accept="image/*" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class='bx bx-save'></i> Simpan Data
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

        // Pastikan ada file yang dipilih
        if (image.files && image.files[0]) {
            const reader = new FileReader();

            // Saat file selesai dibaca
            reader.onload = function (e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block'; // Menampilkan gambar
            }

            reader.readAsDataURL(image.files[0]);
        }
    }
</script>