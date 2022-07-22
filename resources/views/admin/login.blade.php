@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-lg-5">

    @include('components.alert-login')

    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Login Admin</h1>
      <form action="{{ route('admin.login')}}" method="post">
        @csrf
        <div class="form-floating">
          <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
            id="username" autofocus required>
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      {{-- <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small> --}}
    </main>
  </div>
</div>
@endsection