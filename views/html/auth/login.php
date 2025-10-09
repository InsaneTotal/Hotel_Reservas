<?php
include_once 'views/html/layouts/header.php';
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
?>

<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow p-4" style="min-width: 350px;">
            <h2 class="mb-4 text-center">Iniciar Sesión</h2>
            <form action="<?= SITE_URL ?>index.php?action=validateUser" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="username" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
                <div class="text-end">
                    <a href="#" class="small">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include_once "views/html/Layouts/footer.php"; ?>