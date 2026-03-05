@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2>Edit Fasilitas</h2>
    <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $fasilitas->judul }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $fasilitas->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Baru (Kosongkan jika tidak ingin ganti)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection