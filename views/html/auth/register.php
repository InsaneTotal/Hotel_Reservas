<?php
include_once 'views/html/Layouts/header.php'; ?>

<body>
    <div class="card-custom">
        <h2 class="mb-4 text-center">Crear Cuenta</h2>
        <form action="<?= SITE_URL ?>index.php?action=createUser" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-card-list"></i></span>
                        <select class="form-select" id="tipo_documento" name="tipo_documento">
                            <option value="">Seleccione...</option>
                            <option value="1">Cédula de ciudadania</option>
                            <option value="2">Pasaporte</option>
                            <option value="3">Cedula de Extranjería</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="numero_documento" class="form-label">Número</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-hash"></i></span>
                        <input type="text" class="form-control" id="numero_documento"
                            name="numero_documento">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-telephone"></i></span>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text bg-primary text-white"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password">
                    <button class="btn btn-outline-primary" type="button" id="togglePassword" tabindex="-1">
                        <i class="bi bi-eye" id="icon-eye"></i>
                    </button>
                </div>
            </div>
            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-custom">
                    <i class="bi bi-person-plus"></i> Crear Cuenta
                </button>
            </div>
            <div class="text-center text-link mt-2">
                <span>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></span>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS y Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="views/js/showpassword.js"></script>
</body>

<?php
include_once 'views/html/Layouts/footer.php';
?>