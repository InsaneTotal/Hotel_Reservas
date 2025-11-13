<?php

namespace App\Controllers;

class PdfController
{
    public function generatePDF()
    {

        // create new PDF document
        $pdf = new \TCPDF();
        // set document information
        $pdf->SetCreator('Hotel Conchasumae');
        $pdf->SetAuthor('Sebastian A.');
        $pdf->SetTitle('Reporte de Reservas');
        $pdf->SetSubject('Reporte de Reservas');
        $pdf->SetKeywords('TCPDF, PDF, report, reservations');
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetFontSubsetting(true);


        //set default header data
        $pdf->SetHeaderData('./views/img/hotel-logo.webp', 10, 'Reporte de Reservas', 'Hotel Conchasumae', [0, 64, 0], [0, 64, 128]);
        $pdf->setFooterData([0, 64, 0], [0, 64, 128]);

        // set header and footer fonts
        $pdf->setHeaderFont(['dejavusans', '', 12]);
        $pdf->setFooterFont(['dejavusans', '', 10]);

        $pdf->setHeaderMargin(5);
        $pdf->setFooterMargin(5);
        $pdf->SetMargins(0, 20, 0);
        $pdf->SetAutoPageBreak(true, 15);

        // set font
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->AddPage();
        $pdf->setMargins(15, 3, 15);
        $pdf->Cell(0, 10, 'Reporte de Reservas', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('dejavusans', '', 10);

        $pdf->Cell(50, 10, 'Habitación', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Fecha Entrada', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Fecha Salida', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Solicitud Especial', 1, 0, 'C');
        $pdf->Ln();

        // Fetch reservation data from the session

        $reservations = $_SESSION['userReservations'] ?? [];
        foreach ($reservations as $reservation) {

            $pdf->Cell(50, 10, $reservation['habitacion'], 1, 0, 'C');
            $pdf->Cell(40, 10, $reservation['checkin'], 1, 0, 'C');
            $pdf->Cell(40, 10, $reservation['checkout'], 1, 0, 'C');
            $pdf->Cell(50, 10, $reservation['specialrequest'], 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->Output('reporte_reservas.pdf', 'I');
    }
}
