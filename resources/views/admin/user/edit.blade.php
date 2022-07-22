@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Edit {{ $title }}</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
        <div class="col-sm-9">
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}" required autofocus>
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        </div>
        @enderror
      </div>
  </div>
  <div class="mb-3 row">
    <label for="npm" class="col-sm-3 col-form-label">NPM</label>
    <div class="col-sm-9">
      <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm', $user->npm) }}" required>
      @error('npm')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
    <div class="col-sm-9">
      <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas', $user->kelas) }}" required>
      @error('kelas')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="password" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $user->password) }}" required>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <div class="d-grid gap-2" class="col-sm-2 col-form-label">
      <button type="submit" class="btn btn-primary">Edit Data</button>
    </div>
  </div>
  </form>
</div>
</div>
@endsection