@extends('layouts.master')
@section('title', 'Daftar Departemen')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Daftar Departemen</h1>
    <a href="{{ route('departements.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> Tambah Departemen</a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Departemen</th>
                        <th width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departements as $departement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $departement->nama_departemen }}</td>
                        <td>
                            <form action="{{ route('departements.destroy', $departement->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $departement->nama_departemen }}?');">
                                <a class="btn btn-info btn-sm" href="{{ route('departements.show', $departement->id) }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ route('departements.edit', $departement->id) }}"><i class="bi bi-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data Departemen.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
