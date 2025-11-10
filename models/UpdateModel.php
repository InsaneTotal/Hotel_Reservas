<?php

namespace App\Models;

use App\Models\ConexionDatabase;

class UpdateModel
{
    // Model methods would go here
    public function getReservationById($id)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stmt = $conexion->prepare("SELECT * FROM reservation WHERE id = ?");
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Lógica para obtener la reserva por ID desde la base de datos
    }

    public function updateReservation($data)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stmt = $conexion->prepare("UPDATE reservation SET checkin = ?, checkout = ?, specialrequest = ? WHERE id = ?");
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }
        $stmt->bind_param("sssi", $data['checkIn'], $data['checkOut'], $data['recomendaciones'], $data['id']);
        // Lógica para actualizar la reserva en la base de datos
        $stmt->execute();
        $conexion->desconect();
        if ($stmt->affected_rows > 0) {
            return 1; // Éxito
        } else {
            return 0; // Fallo
        }
    }
}
