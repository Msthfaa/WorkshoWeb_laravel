@extends('layouts.master')
@section('title', 'Detail Departemen')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i> Detail Departemen</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4"><strong>Nama Departemen:</strong></div>
            <div class="col-md-8">{{ $departement->nama_departemen }}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><strong>Dibuat Pada:</strong></div>
            <div class="col-md-8">{{ $departement->created_at->format('d M Y, H:i') }}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><strong>Diperbarui Pada:</strong></div>
            <div class="col-md-8">{{ $departement->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('departements.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
