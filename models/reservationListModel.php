<?php

namespace App\Models;

class reservationListModel
{
    public function getReservationsByUserId($userID)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stms = $conexion->prepare("SELECT r.id, r.pay, u.nombre, u.apellido, rm.name AS habitacion, r.checkin, r.checkout, r.specialrequest, sr.name AS estado
                FROM reservation r 
                JOIN users u ON r.id_user = u.id 
                JOIN room rm ON r.id_room = rm.id 
                JOIN status_reservation sr ON r.id_status_reservation = sr.id
                WHERE u.id = ? AND r.id_status_reservation != 3");

        if (!$stms) {
            $conexion->desconect();
            return 0;
        }

        $stms->bind_param("i", $userID);

        $stms->execute();
        $result = $stms->get_result();
        if ($result && $result->num_rows > 0) {
            $reservations = [];
            while ($row = $result->fetch_assoc()) {
                $reservations[] = $row;
            }
            return $reservations;
        }
        return null;
    }

    public function getReservationById($reservationID)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stms = $conexion->prepare("SELECT r.id, r.pay, u.nombre, u.apellido, rm.name AS habitacion, r.checkin, r.checkout, r.specialrequest, sr.name AS estado
                FROM reservation r 
                JOIN users u ON r.id_user = u.id 
                JOIN room rm ON r.id_room = rm.id 
                JOIN status_reservation sr ON r.id_status_reservation = sr.id
                WHERE r.id = ?");

        if (!$stms) {
            $conexion->desconect();
            return 0;
        }

        $stms->bind_param("i", $reservationID);

        $stms->execute();
        $result = $stms->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}
