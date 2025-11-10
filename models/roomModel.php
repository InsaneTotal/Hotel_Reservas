<?php

namespace App\Models;

class RoomModel
{
    // Room model methods would go here
    public function getAvailableRooms($name)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stmt = $conexion->prepare("SELECT * FROM room WHERE id_status_room = 3 AND name = ?");
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $rooms = [];
            while ($row = $result->fetch_assoc()) {
                $rooms[] = $row;
            }
            return $rooms;
        }

        return null;
    }
}
