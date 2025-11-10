<?php
include_once "views/html/layouts/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="views/img/hotel-logo.webp" type="image/x-icon">


    <title>Hotel Conchasumadre - Mis Reservas</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4">Mis Reservas</h2>
                <a class="btn btn-success" href="<?= SITE_URL ?>index.php?action=generarexcel" target="_blank">Generar Excel</a>
                <a class="btn btn-danger" href="<?= SITE_URL ?>index.php?action=generarpdf" target="_blank">Generar PDF</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Habitación</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Pago</th>
                            <th>Recomendaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['userReservations']) && !empty($_SESSION['userReservations'])):

                            foreach ($_SESSION['userReservations'] as $reservation) :
                        ?>
                                <tr>
                                    <td><?= $_SESSION['user_data']['full_name'] ?></td>
                                    <td><?= $reservation['habitacion'] ?></td>
                                    <td><?= $reservation['checkin'] ?></td>
                                    <td><?= $reservation['checkout'] ?></td>
                                    <td><?= $reservation['pay'] ?></td>
                                    <td><?= $reservation['specialrequest'] ?></td>
                                    <td>
                                        <a class="btn btn-warning btnEdit" data-id="<?= $reservation['id'] ?>" data-nameuser='<?= htmlspecialchars($_SESSION['user_data']['full_name'], ENT_QUOTES, "UTF-8") ?>'>
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="btn btn-danger" href="<?= SITE_URL ?>index.php?action=eliminarReserva&id=<?= $reservation['id'] ?>">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a class="btn btn-info btnEmail" data-id="<?= $reservation['id'] ?>">
                                            <i class="bi bi-envelope"></i>
                                        </a>
                                    </td>

                                </tr>
                        <?php
                            endforeach;
                        else: echo "<tr><td colspan='6'>No se encontraron reservas.</td></tr>";
                        endif;
                        ?>
                    </tbody>
                </table>
                <?php
                if (isset($_SESSION['message'])) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: '{$_SESSION['message']}',
                            confirmButtonText: 'Aceptar'
                        });
                    </script>";
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '{$_SESSION['error']}',
                            confirmButtonText: 'Aceptar'
                        });
                    </script>";
                    unset($_SESSION['error']);
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Modal Editar Reserva -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditar" method="POST" action="index.php?action=editarReserva">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id_reserva">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="habitacion" class="form-label">Habitacion</label>
                            <input type="text" class="form-control" id="habitacion" name="habitacion" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="checkIn" class="form-label">Check-in</label>
                            <input type="date" class="form-control" id="checkIn" name="checkIn">
                        </div>
                        <div class="mb-3">
                            <label for="checkOut" class="form-label">Check-out</label>
                            <input type="date" class="form-control" id="checkOut" name="checkOut">
                        </div>
                        <div class="mb-3">
                            <label for="pay" class="form-label">Monto a pagar</label>
                            <input type="text" class="form-control" id="pay" name="pay" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="recomendaciones" class="form-label">Recomendaciones</label>
                            <input type="text" class="form-control" id="recomendaciones" name="recomendaciones">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="views/js/sendEmail.js"></script>
    <script src="views/js/editReservation.js"></script>
    <?php
    include_once "views/html/layouts/footer.php";
    ?>
</body>

</html>