<?php

namespace App\Controllers;

use App\Models\UpdateModel;


class EditeController
{
    public function updateReservation($data)
    {
        $updateModel = new UpdateModel();
        $reservationUpdated = $updateModel->updateReservation($data);
        if ($reservationUpdated > 0) {
            $_SESSION['message'] = "Reserva actualizada exitosamente.";
            header("Location: index.php?action=misreservas");
            exit();
        } else {
            $_SESSION['error'] = "Error al actualizar la reserva.";
            header("Location: index.php?action=misreservas");
            exit();
        }
    }
}
