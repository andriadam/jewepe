<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Jewepe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" aria-current="page"
            href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/course*') ? 'active' : '' }}" href="{{ route('admin.course.index') }}">Kursus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/schedule*') ? 'active' : '' }}" href="{{ route('admin.schedule.index') }}">Jadwal Kursus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/registration*') ? 'active' : '' }}" href="{{ route('admin.registration.index') }}">Pendaftaraan</a>
        </li>
      </ul>
      @auth
      <form class="d-flex ms-auto" action="{{ route('admin.logout') }}" method="post">
        @csrf
        <button class="btn btn-light" type="submit">Logout</button>
      </form>
      @endauth
    </div>
  </div>
</nav>