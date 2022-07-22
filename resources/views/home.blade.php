
@extends('layouts.app')

@section('content')
<div style="height: 80vh;" class="container d-flex">
  <div style="flex-basis: 50%; flex-direction: column;" class="d-flex justify-content-center flex-col">
    <h1 style="font-size: 40px;">Selamat Datang,</h1>
    <h1>Di Website Pendaftaran Kursus</h1>
    <p>website untuk daftar kursus universitas jewepe</p>
    <div>
      <button type="button" class="btn btn-primary"><a href="/course" style="text-decoration: none; color: white;">
          Daftar Kursus</a></button>
    </div>
  </div>
  <div style="flex-basis: 50%;" class="d-flex align-items-center">
    <img style="height: 380px;" src="https://i.postimg.cc/hGJJyWNz/kitty-1.png" />
  </div>
</div>
@endsection