@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Daftar {{ $title }}</h2>
</div>
<div class="row">
  <div class="col-sm-12">
    @include('components.alert')
  </div>
  <div class="col-sm-12">
    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary">
      Tambah
      {{ $title }}</a>
  </div>
</div>
<div class="row mt-2">
  <table class="table" id="table1">
    <thead>
      <tr>
        <th>No. </th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Kelas</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->npm }}</td>
        <td>{{ $row->kelas }}</td>
        <td>
          <a href="{{ route('admin.user.edit', $row->id) }}" class="btn btn-success">Edit</a>
          <form action="{{ route('admin.user.destroy', $row->id) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
              Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr class="text-center">
        <td colspan="6">No {{ $title }} found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection