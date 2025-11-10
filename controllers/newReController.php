<?php


namespace App\Controllers;

use App\Models\NewReModel;

class NewReController
{
    // Controller methods would go here
    public function createReservation($data)
    {
        $newReModel = new NewReModel();
        $result = $newReModel->createReservation($data);
        if ($result > 0) {
            $_SESSION['message'] = "Reserva creada exitosamente.";
            header("Location: index.php?action=misreservas");
            exit();
        } else {
            $_SESSION['error'] = "Error al crear la reserva.";
            header("Location: index.php?action=reservationForm");
            exit();
        }
    }
}
