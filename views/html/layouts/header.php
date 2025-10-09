<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="views/img/hotel-logo.webp" type="image/x-icon">
  <title>Hotel Conchasumadre</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <nav class="navbar bg-body-tertiary d-flex flex-column">
    <div class="container-fluid">
      <a class="navbar-brand" href=" <?= SITE_URL ?>index.php">
        <img src="views/img/hotel-logo.webp" alt="hotel logo with stylized seashell and the words Hotel Conchasumadre in a welcoming and elegant font, set against a bright background suggesting a relaxing beach environment" width="30" height="24" class="d-inline-block align-text-top">
        Hotel Conchasumadre
      </a>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= SITE_URL ?>index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mis reservas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nuevas Reserva</a>
        </li>

      </ul>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown button
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
  </nav>

</body>

</html>