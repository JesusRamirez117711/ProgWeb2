<nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
  <div class="container-fluid">
    <img src="img/logo1.png" width="50" alt="...." class="navbar-brand">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active fs-5" href="{{ route('index') }}">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="{{ Route('clientes.index')}}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="{{ Route('perfiles.index')}}">Perfiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="{{ Route('facturas.index')}}">Facturación</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5" href="#">Pagos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
