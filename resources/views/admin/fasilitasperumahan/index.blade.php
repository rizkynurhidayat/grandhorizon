@extends('admin.dashboard')

{{-- Tambahkan ini agar Icon muncul --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Fasilitas Perumahan (Slider)</h5>
            <a href="{{ route('fasilitasperumahan.create') }}" class="btn btn-primary">Tambah Foto Slider</a>
        </div>
        <div class="card-body">
            {{-- ALERT SUKSES --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive text-nowrap mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Fasilitas</th>
                            <th>Gambar</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fasilitas as $item)
                            <tr>
                                <td>{{ $item->nama_fasilitas }}</td>
                                <td><img src="{{ asset('storage/' . $item->gambar) }}" width="100"></td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-link text-dark shadow-none" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i> </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                            <li>
                                                <a class="dropdown-item text-info"
                                                    href="{{ route('fasilitasperumahan.edit', $item->id) }}">
                                                    <i class="bi bi-pencil me-2"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('fasilitasperumahan.destroy', $item->id) }}"
                                                    method="POST" onsubmit=>
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bi bi-trash me-2"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection