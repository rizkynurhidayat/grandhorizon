@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Edit Tipe Rumah: {{ $t->nama_tipe_rumah }}</h5>
            </div>
            <div class="card-body">
                <form id="formEditTipe" action="{{ route('tiperumah.update', $t->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Tipe Rumah</label>
                            <input type="text" name="nama_tipe_rumah" class="form-control" value="{{ $t->nama_tipe_rumah }}"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Luas Bangunan/Tanah</label>
                            <input type="text" name="luas_bangunan" class="form-control" value="{{ $t->luas_bangunan }}"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ $t->harga }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cicilan</label>
                            <input type="text" name="cicilan" class="form-control" value="{{ $t->cicilan }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Teks Tombol</label>
                            <input type="text" name="tekstombol" class="form-control" value="{{ $t->tekstombol }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kamar Tidur</label>
                            <div class="input-group">
                                <input type="number" name="kamar_tidur" class="form-control" value="{{ $t->kamar_tidur }}"
                                    required>
                                <span class="input-group-text">Bedrooms</span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kamar Mandi</label>
                            <div class="input-group">
                                <input type="number" name="kamar_mandi" class="form-control" value="{{ $t->kamar_mandi }}"
                                    required>
                                <span class="input-group-text">Bathrooms</span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Garasi/Carport</label>
                            <div class="input-group">
                                <input type="number" name="garasi" class="form-control" value="{{ $t->garasi }}" required>
                                <span class="input-group-text">Carport</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label">Ganti Foto (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="gambar" class="form-control mb-2" id="imgInput">
                        <img id="imgPreview" src="{{ asset('storage/' . $t->gambar) }}" width="150"
                            class="rounded border p-1 bg-light">
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" form="formEditTipe" class="btn btn-primary shadow-sm">Update Data</button>
            <a href="{{ route('tiperumah.index') }}" class="btn btn-outline-secondary shadow-sm">Kembali</a>
        </div>
    </div>

    <script>
        imgInput.onchange = evt => {
            const [file] = imgInput.files
            if (file) imgPreview.src = URL.createObjectURL(file)
        }
    </script>
@endsection