<?php

namespace App\Controllers;

use App\Models\ReservationListModel;

class ReservationListController
{
    // Controller methods would go here
    public function getUserReservations()
    {
        $reservationListModel = new ReservationListModel();
        $reservations = $reservationListModel->getReservationsByUserId(intval($_SESSION['user_data']['id']));

        if ($reservations !== null) {
            $_SESSION['userReservations'] = $reservations;
            header("Location: index.php?action=mostrarreservas");
            exit();
        } else {
            $_SESSION['message'] = "No se encontraron reservas para este usuario.";
            header("Location: index.php?action=mostrarreservas");
            exit();
        }
    }

    public function getReservationData($reservationID)
    {
        $reservationListModel = new ReservationListModel();
        $reservation = $reservationListModel->getReservationById(intval($reservationID));

        if ($reservation !== null) {
            header('Content-Type: application/json');
            echo json_encode($reservation);
            exit();
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Reserva no encontrada']);
            exit();
        }
    }
}
