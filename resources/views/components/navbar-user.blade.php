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
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('course*') ? 'active' : '' }}" href="/course">Kursus</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link {{ Request::is('login*') ? 'active' : '' }}" href="/login">Login</a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
          <a class="nav-link {{ Request::is('myRegistration*') ? 'active' : '' }}" href="/myRegistration">Pendaftaran
            Saya</a>
        </li>
        @endauth
      </ul>
      @auth
      <form class="d-flex ms-auto" action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-light" type="submit">Logout</button>
      </form>
      @endauth
    </div>
  </div>
</nav>