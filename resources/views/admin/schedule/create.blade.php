@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Tambah {{ $title }}</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('admin.schedule.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 row">
        <label for="nama_kursus" class="col-sm-3 col-form-label">Nama kursus</label>
        <div class="col-sm-9">
          <input type="text" name="nama_kursus" class="form-control @error('nama_kursus') is-invalid @enderror" required
            autofocus>
          @error('nama_kursus')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        </div>
        @enderror
      </div>
  </div>
  <div class="mb-3 row">
    <label for="waktu_kursus" class="col-sm-3 col-form-label">waktu_kursus</label>
    <div class="col-sm-9">
      <input type="datetime-local" name="waktu_kursus" class="form-control @error('waktu_kursus') is-invalid @enderror"
        required>
      @error('waktu_kursus')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <div class="d-grid gap-2" class="col-sm-2 col-form-label">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
  </div>
  </form>
</div>
</div>
@endsection