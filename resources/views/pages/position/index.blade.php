@extends('layouts.master')
@section('title', 'Daftar Jabatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Daftar Jabatan</h1>
    <a href="{{ route('positions.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i> Tambah Jabatan</a>
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
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th width="200px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>Rp{{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $position->nama_jabatan }}?');">
                                <a class="btn btn-info btn-sm" href="{{ route('positions.show', $position->id) }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-primary btn-sm" href="{{ route('positions.edit', $position->id) }}"><i class="bi bi-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data Jabatan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
