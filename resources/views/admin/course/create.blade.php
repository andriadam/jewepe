@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Tambah {{ $title }}</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 row">
        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required autofocus>
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        </div>
        @enderror
      </div>
  </div>
  <div class="mb-3 row">
    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9">
      <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required>
      @error('keterangan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="lama_kursus" class="col-sm-3 col-form-label">Lama Kursus(Hari)</label>
    <div class="col-sm-9">
      <input type="number" name="lama_kursus" class="form-control @error('lama_kursus') is-invalid @enderror" required>
      @error('lama_kursus')
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