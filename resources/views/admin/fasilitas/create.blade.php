@extends('admin.dashboard')

@section('content')
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
@endsection