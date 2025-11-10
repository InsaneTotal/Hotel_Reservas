<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;

class MailController
{
    public function sendReservationEmail($reservationId)
    {
        if (!isset($_SESSION['userReservations']) || empty($_SESSION['userReservations'])) {
            echo "No hay reservas disponibles para enviar.";
            return;
        }

        $reservation = null;
        foreach ($_SESSION['userReservations'] as $res) {
            if ($res['id'] == $reservationId) {
                $reservation = $res;
                break;
            }
        }
        try {
            // Ejemplo básico usando mail()
            // Looking to send emails in production? Check out our Email API/SMTP product!
            $phpmailer = new PHPMailer();
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '60afecda1440ff';
            $phpmailer->Password = '77a7081c83bfb3';

            $phpmailer->setFrom('no-reply@hotel.com', 'Hotel Conchasumadre');
            $phpmailer->addAddress($_SESSION['user_data']['email'], $_SESSION['user_data']['full_name']);
            $phpmailer->Subject = 'Confirmación de Reserva';
            $phpmailer->Body = "Hola {$_SESSION['user_data']['full_name']},Gracias por reservar con nosotros. Aquí están los detalles de su reserva:" .
                "Habitación: {$reservation['habitacion']}" .
                "Check-in: {$reservation['checkin']}" .
                "Check-out: {$reservation['checkout']}" .
                "Pago: {$reservation['pay']}" .
                "Estado: {$reservation['specialrequest']}" .
                "¡Esperamos verte pronto! Saludos, El equipo de Hotel Conchasumadre";

            if (!$phpmailer->send()) {
                echo "Error al enviar el correo: " . $phpmailer->ErrorInfo;
            } else {
                echo "Correo enviado con éxito.";
            }
        } catch (\Throwable $th) {
            echo "Error al enviar el correo: " . $th->getMessage();
        }
    }
}


$array = [
    ['id' => 3, 'file' => 'controllers/MailController.php', 'description' => 'App\Controllers\MailController'],
    ['id' => 4, 'file' => 'controllers/MailController.php', 'description' => 'App\Controllers\MailController'],
    ['id' => 5, 'file' => 'controllers/MailController.php', 'description' => 'App\Controllers\MailController'],
    ['id' => 6, 'file' => 'controllers/MailController.php', 'description' => 'App\Controllers\MailController'],
];
