@extends('layouts.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Pendaftaran</h2>
</div>
<div class="row">
  <div class="col-sm-12">
    @include('components.alert')
  </div>
  <table class="table" id="table1">
    <thead>
      <tr>
        <th>No. </th>
        <th>ID</th>
        <th>Nama Pendaftar</th>
        <th>Kursus</th>
        <th>Tanggal kursus</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($registrations as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->id }}</td>
        <td>{{ $row->user->nama }}</td>
        <td>{{ $row->schedule->nama_kursus }}</td>
        <td>{{ date('d-m-Y H:i', strtotime($row->schedule->waktu_kursus)) }} WIB</td>
        <td>{{ $row->status }}</td>
        <td>
          @if ($row->status == "Dikonfirmasi")
          <a href="registration/cetak/{{ $row->id }}" target="_blank" class="btn btn-primary">Cetak</a>
          @endif
        </td>
      </tr>
      @empty
      <tr class="text-center">
        <td colspan="7">No registrations found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection