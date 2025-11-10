<?php

namespace App\Controllers;

use App\Models\RoomModel;

class RoomsController
{
    // Controller methods would go here
    public function getAvailableRooms($nameRoom)
    {
        $roomModel = new RoomModel();
        $availableRooms = $roomModel->getAvailableRooms($nameRoom);
        if ($availableRooms != null) {
            foreach ($availableRooms as $room) {
                echo "<option value='" . $room['id'] . "'>" . $room['descripcion'] . "</option>";
            }
        } else {
            echo "<option value=''>No hay habitaciones disponibles</option>";
        }
    }
}
