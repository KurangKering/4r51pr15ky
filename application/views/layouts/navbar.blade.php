<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="{{ base_url() }}" class="nav-link"><i class="far fa-circle"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-circle"></i><span>PNBP</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="{{ base_url("pnbp/hp") }}" class="nav-link">HP</a></li>
          <li class="nav-item"><a href="{{ base_url("pnbp/hgb") }}" class="nav-link">HGB</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-circle"></i><span>BMN</span></a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="{{ base_url("bmn/hp") }}" class="nav-link">HP</a></li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="{{ base_url("pencarian") }}" class="nav-link"><i class="far fa-circle"></i><span>Pencarian</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ base_url("laporan") }}" class="nav-link"><i class="far fa-circle"></i><span>Laporan</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ base_url("pengguna") }}" class="nav-link"><i class="far fa-circle"></i><span>Pengguna</span></a>
      </li>
    </ul>
  </div>
</nav>