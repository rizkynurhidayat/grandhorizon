@extends('admin.dashboard')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex align-items-center justify-content-between py-3">
            <h5 class="mb-0">Data Tentang Grand Horizon</h5>
            <a class="btn btn-primary" href="{{ route('tentang.create') }}">
                <i class="bx bx-plus me-1"></i> Tambah Tentang
            </a>
        </div>
        
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Subjudul</th>
                        <th>Gambar Utama</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($tentangs as $item)
                    <tr>
                        <td><strong>{{ $item->judul }}</strong></td>
                        <td>{{ $item->subjudul }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded" width="80" alt="img">
                        </td>
                        <td>
                            <div class="p-1 bg-dark d-inline-block rounded">
                                <img src="{{ asset('storage/' . $item->logo) }}" width="30" alt="icon">
                            </div>
                        </td>
                        <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('tentang.edit', $item->id) }}"
                              ><i class="bx bx-edit-alt me-1"></i> 
                              Edit</a>
                            <form action="{{ route('tentang.destroy', $item->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                              Delete</button>
                            </form>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Data belum ada. Klik "Tambah Tentang".</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection