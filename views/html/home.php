<?php
include_once "layouts/header.php";

?>

<h1>Bienvenido a la pagina de reservas en linea</h1>
<br>
<?php if (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
} ?>
<div class="d-flex gap-2">
    <div class="d-inline-block" style="width: 120px; height: 38px;">
        <a class="btn btn-danger w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVAS/index.php?action=loginUser">Ingresar</a>
    </div>

    <div class="d-inline-block" style="width: 120px; height: 38px;">
        <a class="btn btn-success w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVAS/index.php?action=registerUser">Registrarme</a>
    </div>



</div>


<!-- Aquí va el contenido principal de la página -->
<?php
include_once "layouts/footer.php";
?>