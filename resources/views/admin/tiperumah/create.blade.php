@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Tambah Tipe Rumah Baru</h5>
            </div>
            <div class="card-body">
                <form id="formTipe" action="{{ route('tiperumah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Tipe Rumah</label>
                            <input type="text" name="nama_tipe_rumah" class="form-control"
                                placeholder="Contoh: Tipe Horizon Lite" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Luas Bangunan/Tanah</label>
                            <input type="text" name="luas_bangunan" class="form-control" placeholder="Contoh: LT 40m LB 60m"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control"
                                placeholder="Contoh: Rp900 Juta – Rp1,2 Miliar" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cicilan</label>
                            <input type="text" name="cicilan" class="form-control"
                                placeholder="Contoh: Cicilan mulai 3,0 JT-an" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Teks Tombol</label>
                            <input type="text" name="tekstombol" class="form-control" value="CEK KETERSEDIAAN UNIT"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah Kamar Tidur</label>
                            <div class="input-group">
                                <input type="number" name="kamar_tidur" class="form-control" placeholder="0" required>
                                <span class="input-group-text">Bedrooms</span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah Kamar Mandi</label>
                            <div class="input-group">
                                <input type="number" name="kamar_mandi" class="form-control" placeholder="0" required>
                                <span class="input-group-text">Bathrooms</span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Garasi/Carport</label>
                            <div class="input-group">
                                <input type="number" name="garasi" class="form-control" placeholder="0" required>
                                <span class="input-group-text">Carport</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Tipe Rumah</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" form="formEditTipeRumah" class="btn btn-primary px-4 shadow-sm">
                <i class="bx bx-save me-1"></i> Simpan Perubahan
            </button>
            <a href="{{ route('tiperumah.index') }}" class="btn btn-outline-secondary px-4">
                <i class="bx bx-arrow-back me-1"></i> Batal
            </a>
        </div>
    </div>
@endsection