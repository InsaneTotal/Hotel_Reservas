<?php
include_once 'views/html/Layouts/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="views/img/hotel-logo.webp" type="image/x-icon">
    <title>Hotel Conchasumadre - Registro de usuario</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-md">
        <div class="card p-4 mt-4 mb-4 shadow w-50 mx-auto">
            <div class="card-title">
                <h3 class="mb-4 text-center">Crear Cuenta</h3>
            </div>
            <div class="card-body">
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
                            <?php if (isset($_SESSION['errors']['tipo_documento'])): echo "<small class='text-danger'> {$_SESSION['errors']['tipo_documento']} </small>";
                            endif ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="numero_documento" class="form-label">Número</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-hash"></i></span>

                                <input type="text" class="form-control" id="numero_documento"
                                    name="numero_documento" value="<?php if (isset($_SESSION['old']['numero_documento'])): echo $_SESSION['old']['numero_documento'];
                                                                    else: echo '';
                                                                    endif ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['numero_documento'])): echo "<small class='text-danger'> {$_SESSION['errors']['numero_documento']} </small>";
                            endif ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php if (isset($_SESSION['old']['nombre'])): echo $_SESSION['old']['nombre'];
                                                                                                            else: echo '';
                                                                                                            endif ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['nombre'])): echo "<small class='text-danger'> {$_SESSION['errors']['nombre']} </small>";
                            endif ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php if (isset($_SESSION['old']['apellido'])): echo $_SESSION['old']['apellido'];
                                                                                                                else: echo '';
                                                                                                                endif ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['apellido'])): echo "<small class='text-danger'> {$_SESSION['errors']['apellido']} </small>";
                            endif ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-telephone"></i></span>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php if (isset($_SESSION['old']['telefono'])): echo $_SESSION['old']['telefono'];
                                                                                                            else: echo '';
                                                                                                            endif ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['telefono'])): echo "<small class='text-danger'> {$_SESSION['errors']['telefono']} </small>";
                            endif ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_SESSION['old']['email'])): echo $_SESSION['old']['email'];
                                                                                                        else: echo '';
                                                                                                        endif ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['email'])): echo "<small class='text-danger'> {$_SESSION['errors']['email']} </small>";
                            endif ?>
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
                        <?php if (isset($_SESSION['errors']['contrasena'])): echo "<small class='text-danger'> {$_SESSION['errors']['contrasena']} </small>";
                        endif ?>
                        <div id="passwordMessage" class="form-text">
                            <small><i class="bi bi-check-circle"></i> Al menos una mayuscula</small> <br>
                            <small><i class="bi bi-check-circle"></i> Al menos un numero</small> <br>
                            <small><i class="bi bi-check-circle"></i> Al menos un caracter especial (@$!%*?&#)</small>
                        </div>
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-person-plus"></i> Crear Cuenta
                        </button>
                    </div>
                    <div class="text-center text-link mt-2">
                        <span>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS y Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="views/js/showpassword.js"></script>
    <script src="views/js/regexPassword.js"></script>
    <?php
    include_once 'views/html/Layouts/footer.php';
    ?>
</body>

</html>