@extends('admin.dashboard') 

@section('content')
<div class="container">
    <h2>Daftar Fasilitas Grand Horizon</h2>
    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitas as $f)
            <tr>
                <td>{{ $f->judul }}</td>
                <td>{{ $f->deskripsi }}</td>
                <td><img src="{{ asset('/storage/fasilitas/'.$f->gambar) }}" width="100"></td>
                <td>
                    <form action="{{ route('fasilitas.destroy', $f->id) }}" method="POST">
                        <a href="{{ route('fasilitas.edit', $f->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection