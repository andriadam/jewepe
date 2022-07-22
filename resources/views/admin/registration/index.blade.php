@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Pendaftaraan</h2>
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
          @if ($row->status != "Dikonfirmasi")
          <a href="{{ route('admin.registration.show', $row->id) }}" class="btn btn-primary">Konfirmasi</a>
          @endif
          <form action="{{ route('admin.registration.destroy', $row->id) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
              Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr colspan="6">
        <td class="text-center">No registrations found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection