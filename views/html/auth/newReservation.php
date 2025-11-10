<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="views/img/hotel-logo.webp" type="image/x-icon">
    <title>Hotel Conchasumadre - Nueva reserva</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include_once "views/html/layouts/header.php";
    ?>


    <div class="container mt-4 text-center d-flex flex-column align-items-center">
        <h1>Bienvenido a la pagina de reservas en linea</h1>
        <br>
        <div class="card w-50">
            <div class="card-body">
                <h2>Realizar Nueva Reserva</h2>
                <form action=" <?= SITE_URL ?>index.php?action=createReservation" method="POST">
                    <div class="mb-3">
                        <label for="tipoHabitacion" class="form-label mb-3">Habitación</label>
                        <select class="form-select mb-3" id="tipoHabitacion" name="tipoHabitacion" required>
                            <option value="" disabled selected>Seleccione tipo de habitación</option>
                            <option value="sencilla">Sencilla</option>
                            <option value="doble estandar">Doble</option>
                            <option value="triple">Triple</option>
                            <option value="suite ejecutiva">Suite Ejecutiva</option>
                            <option value="familiar">Familiar</option>
                            <option value="economica">Económica</option>
                            <option value="premium vista mar">Premium Vista Mar</option>
                            <option value="cabaña deluxe">Cabaña Deluxe</option>
                        </select>
                        <select class="form-select mb-3" id="habitacion" name="habitacion" required>
                            <option value="" disabled selected>Seleccione una habitación</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="nights" class="form-label">Noches</label>
                            <input type="number" class="form-control" id="nights" name="nights" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="pay" class="form-label">Pago total</label>
                            <input type="number" min="0" class="form-control" id="pay" name="pay" readonly value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="checkin" class="form-label">Fecha de entrada</label>
                        <input type="date" class="form-control" id="checkin" name="checkin">
                        <label for="checkout" class="form-label">Fecha de salida</label>
                        <input type="date" class="form-control" id="checkout" name="checkout">
                    </div>
                    <div class="mb-3">
                        <label for="specialrequests" class="form-label">Recomendaciones</label>
                        <textarea class="form-control" id="specialrequests" name="specialrequests" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Reservar</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="views/js/showPay.js"></script>
    <script src="views/js/scriptajax.js"></script>
    <script src="views/js/dateLimitation.js"></script>

    <?php
    include_once "views/html/layouts/footer.php";
    ?>

</body>

</html>