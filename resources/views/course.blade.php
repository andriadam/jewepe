@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
  <h1 class="mb-3">Kursus</h1>
  <div class="row">
    @forelse ($courses as $row)
    <div class="col-sm-3 mb-4">
      <div class="card" style="min-height: 100%">
        <div class="card-body">
          <h5 class="card-title">{{ $row->nama }}</h5>
          <p class="card-text">{{ $row->keterangan }}</p>
          <p class="card-text">{{ $row->lama_kursus }} hari</p>
          <div class="d-grid gap-2" style="margin-top:auto">
            <a class="btn btn-primary" href="/registration/{{ $row->id }}">Daftar Kursus</a>
          </div>
        </div>
      </div>
    </div>
    @empty
    <p class="text-center text-white">Tidak ada produk.</p>
    @endforelse
  </div>
</div>
@endsection