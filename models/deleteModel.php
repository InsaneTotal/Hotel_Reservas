<?php

namespace App\Models;

use App\Models\ConexionDatabase;

class DeleteModel
{
    public function deleteReservation($reservationId)
    {
        // Add methods for deleting reservations here
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stmt = $conexion->prepare("UPDATE reservation SET id_status_reservation = 3 WHERE id = ?");
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }
        $stmt->bind_param("i", $reservationId);
        $stmt->execute();
        $conexion->desconect();
        if ($stmt->affected_rows > 0) {
            $stmt->close();
            return 1; // Éxito
        } else {
            return 0; // Fallo
        }
    }
    // Add methods for deleting reservations here
}
