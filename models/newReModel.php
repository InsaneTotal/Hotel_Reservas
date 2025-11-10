<?php

namespace App\Models;

class NewReModel
{
    // Model methods would go here
    public function createReservation($data)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();

        $stmt = $conexion->prepare(
            "INSERT INTO reservation (id_user, id_room, checkin, checkout, pay, specialrequest) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }

        $stmt->bind_param(
            "iissds",
            $_SESSION['user_data']['id'],
            $data['habitacion'],
            $data['checkin'],
            $data['checkout'],
            $data['pay'],
            $data['specialrequests']
        );
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        $conexion->desconect();

        return $affectedRows;
    }
}
