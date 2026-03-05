@extends('admin.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Daftar Tipe Rumah</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4">Nama Tipe</th>
                            <th>Gambar</th>
                            <th>Harga & Cicilan</th>
                            <th>Spesifikasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipeRumah as $t)
                            <tr>
                                <td class="ps-4 fw-bold">{{ $t->nama_tipe_rumah }}<br><small
                                        class="text-muted">{{ $t->luas_bangunan }}</small></td>
                                <td><img src="{{ asset('storage/' . $t->gambar) }}" width="80" class="rounded"></td>
                                <td><span class="d-block fw-medium">{{ $t->harga }}</span><small
                                        class="text-info">{{ $t->cicilan }}</small></td>
                                <td>
                                    <small>🛏️ {{ $t->kamar_tidur }} | 🚿 {{ $t->kamar_mandi }} | 🚗 {{ $t->garasi }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn p-0 hide-arrow" data-bs-toggle="dropdown"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('tiperumah.edit', $t->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('tiperumah.destroy', $t->id) }}" method="POST"
                                                onsubmit=>
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('tiperumah.create') }}" class="btn btn-primary shadow-sm"><i class="bx bx-plus"></i> Tambah
                Tipe Rumah</a>
        </div>
    </div>
@endsection