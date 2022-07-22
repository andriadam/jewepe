@extends('layouts.admin.app')
@section('content')

<div class="row mt-4">
  <div class="col-12 text-center">
    <h3>Konfirmasi</h3>
  </div>
</div>

<section class="section">
  <div class="card">
    <div class="card-header text-end">
      @include('components.alert')
    </div>
    <div class="card-body">
      <div class="container">
        <div class="row justify-content-center mb-3">
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-sm-6">
            <ul class="list-group text-end">
              <li class="list-group-item bg-transparent">ID :</li>
              <li class="list-group-item bg-transparent">Nama :</li>
              <li class="list-group-item bg-transparent">Kelas :</li>
              <li class="list-group-item bg-transparent">NPM :</li>
              <li class="list-group-item bg-transparent">Kursus :</li>
              <li class="list-group-item bg-transparent">Jadwal :</li>
              <li class="list-group-item bg-transparent">KRS :</li>
              <li class="list-group-item bg-transparent">Status :</li>
            </ul>
          </div>
          <div class="col-sm-6">
            <ul class="list-group">
              <li class="list-group-item bg-transparent">{{ $registration->id }}</li>
              <li class="list-group-item bg-transparent">{{ $registration->user->nama }}</li>
              <li class="list-group-item bg-transparent">{{ $registration->user->kelas }}</li>
              <li class="list-group-item bg-transparent">{{ $registration->user->npm }}</li>
              <li class="list-group-item bg-transparent">{{ $registration->schedule->nama_kursus }}</li>
              <li class="list-group-item bg-transparent">{{ date('d-m-Y H:i',
                strtotime($registration->schedule->waktu_kursus)) }} WIB</li>
              <li class="list-group-item bg-transparent"><a href="{{ asset('storage/'.$registration->krs) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Krs</a></li>
              <li class="list-group-item bg-transparent">
                @if ($registration->status)
                {{ $registration->status }}
                @endif
                <span class="badge text-dark ml-2 mb-2">Change :</span>
                <form action="{{ route('admin.registration.updateStatus') }}" method="post">
                  @method('put')
                  @csrf
                  <input type="hidden" value="{{ $registration->id }}" name="id">
                  <select name="status" id="" class="form-select" onchange="form.submit()">
                    <option {{ $registration->status == 'Menunggu konfirmasi' ? "selected": "" }} value="Menunggu
                      konfirmasi">Menunggu
                      konfirmasi</option>
                    <option {{ $registration->status == 'Dikonfirmasi' ? "selected": "" }}
                      value="Dikonfirmasi">Dikonfirmasi</option>
                  </select>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection