<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/assets/logo.png" alt="logo" width="150"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $active === 'home' ? 'active' : '' ?>" aria-current="page" href="/">Inicio</a>
        </li>
        <?php if($rol === 'talent'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-capitalize <?= $active === 'talents' ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= "$username ($rol)"  ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/talents">Ver ofertas de trabajo</a></li>
              <li><a class="dropdown-item" href="/talents_profile">Perfil</a></li>
              <li><a class="dropdown-item text-danger" href="/talents_logout">Cerrar sesion</a></li>
            </ul>
          </li>
        <?php elseif($rol === 'recruiter'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-capitalize <?= $active === 'talents' ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= "$username ($rol)"  ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/recruiters">Administrar Ofertas de trabajo</a></li>
              <li><a class="dropdown-item" href="/recruiters_profile">Perfil</a></li>
              <li><a class="dropdown-item text-danger" href="/recruiters_logout">Cerrar sesion</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= $active === 'recruiters' ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Recruiters
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/recruiters_register">Registrarse</a></li>
              <li><a class="dropdown-item" href="/recruiters_login">Iniciar sesion</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= $active === 'talents' ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Talents
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/talents_register">Registrarse</a></li>
              <li><a class="dropdown-item" href="/talents_login">Iniciar sesion</a></li>
            </ul>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>