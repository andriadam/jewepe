@extends('layouts.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Daftar Kursus</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="/registration/store" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Kursus</label>
        <div class="col-sm-10">
          <input type="text" name="course" class="form-control @error('course') is-invalid @enderror" id="course"
            value="{{ $course->nama }}" required readonly>
          @error('course')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Pilih jadwal</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="schedule_id" required>
            <option value="" selected>--Pilih Jadwal--</option>
            @forelse ($schedules as $row)
            <option value="{{ $row->id }}">{{ date('d-m-Y H:i', strtotime($row->waktu_kursus)) }} WIB</option>
            @empty
            <option value="">Tidak Ada Jadwal</option>
            @endforelse
          </select>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="krs" class="col-sm-2 form-label">Upload KRS</label>
        <div class="col-sm-10">
          <input class="form-control @error('krs') is-invalid @enderror" type="file" id="krs" name="krs" required>
          @error('krs')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <div class="d-grid gap-2" class="col-sm-2 col-form-label">
          <button type="submit" class="btn btn-primary">Daftar Kursus</button>
        </div>
      </div>
  </div>
  </form>
</div>
</div>
@endsection