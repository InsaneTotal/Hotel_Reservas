<?php
include_once 'views/html/layouts/header.php';
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="views/img/hotel-logo.webp" type="image/x-icon">
    <title>Hotel Conchasumadre</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow p-4" style="min-width: 350px;">
            <h2 class="mb-4 text-center">Iniciar Sesión</h2>
            <form action="<?= SITE_URL ?>index.php?action=validateUser" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="username" name="email" required autofocus>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="text-danger mt-1"><?php echo $_SESSION['error'];
                                                        unset($_SESSION['error']); ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
                <div class="text-center w-100 d-flex justify-content-between">
                    <a href="#" class="small">Registrarme</a>
                    <a href="#" class="small">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <?php
    include_once "views/html/Layouts/footer.php"; ?>
</body>

</html>