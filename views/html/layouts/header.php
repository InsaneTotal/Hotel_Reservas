<nav class="navbar bg-body-tertiary d-flex flex-column">
  <div class="container-fluid">
    <a class="navbar-brand" href=" <?= SITE_URL ?>index.php">
      <img src="views/img/hotel-logo.webp" alt="hotel logo with stylized seashell and the words Hotel Conchasumadre in a welcoming and elegant font, set against a bright background suggesting a relaxing beach environment" width="30" height="24" class="d-inline-block align-text-top">
      Hotel Conchasumadre
    </a>
    <?php if (isset($_SESSION['user_data'])): ?>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= SITE_URL ?>index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= SITE_URL ?>index.php?action=habitaciones">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= SITE_URL ?>index.php?action=pqr">PQR</a>
        </li>

      </ul>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          Menu
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="<?= SITE_URL ?>index.php?action=miperfil">Mi Perfil</a></li>
          <li><a class="dropdown-item" href="<?= SITE_URL ?>index.php?action=misreservas">Mis Reservas</a></li>
          <li><a class="dropdown-item" href="<?= SITE_URL ?>index.php?action=nuevareserva">Nueva Reserva</a></li>
          <li><a class="dropdown-item" href="<?= SITE_URL ?>index.php?action=logout">Cerrar Sesión</a></li>
        </ul>
      </div>
    <?php else: ?>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= SITE_URL ?>index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= SITE_URL ?>index.php?action=registerUser">Registrarme</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= SITE_URL ?>index.php?action=pqr">PQR</a>
        </li>

      </ul>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menu
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="<?= SITE_URL ?>index.php?action=loginUser">Iniciar Sesión</a></li>
          <li><a class="dropdown-item" href="<?= SITE_URL ?>index.php?action=registerUser">Registrarme</a></li>

        </ul>
      </div>
    <?php endif; ?>
  </div>
</nav>