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
    <?php
    include_once "layouts/header.php";

    ?>

    <div class="container mt-4">
        <h1>Bienvenido a la pagina de reservas en linea</h1>
        <br>

        <?php if (isset($_SESSION['user_data'])): ?>
            <p>Hola, <?php echo $_SESSION['user_data']['full_name']; ?>. Bienvenido de nuevo.</p>
            <div class="d-flex gap-2">
                <div class="d-inline-block" style="width: 120px; height: 38px;">
                    <a class="btn btn-info w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVAS/index.php?action=misreservas">Mis reservas</a>
                </div>

                <div class="d-inline-block" style="width: 120px; height: 38px;">
                    <a class="btn btn-danger w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVAS/index.php?action=logout">Cerrar sesión</a>
                </div>



            </div>
        <?php else: ?>
            <p>Por favor, inicia sesión para acceder a tus reservas.</p>
            <div class="d-flex gap-2">
                <div class="d-inline-block" style="width: 120px; height: 38px;">
                    <a class="btn btn-danger w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVAS/index.php?action=loginUser">Ingresar</a>
                </div>

                <div class="d-inline-block" style="width: 120px; height: 38px;">
                    <a class="btn btn-success w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVAS/index.php?action=registerUser">Registrarme</a>
                </div>



            </div>
        <?php endif; ?>

    </div>


    <!-- Aquí va el contenido principal de la página -->
    <?php
    include_once "layouts/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>