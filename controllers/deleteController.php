<?php

namespace App\Controllers;

use App\Models\DeleteModel;

class DeleteController
{
    public function deleteReservation($reservationId)
    {
        $deleteModel = new DeleteModel();
        $reservationDeleted = $deleteModel->deleteReservation($reservationId);
        if ($reservationDeleted > 0) {

            header("Location: index.php?action=misreservas");
            exit();
        } else {

            header("Location: index.php?action=misreservas");
            exit();
        }
    }
}
