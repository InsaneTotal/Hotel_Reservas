<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController
{
    public function generateExcel()
    {

        if (!empty($_SESSION['userReservations']) && is_array($_SESSION['userReservations'])) {
            $rows = $_SESSION['userReservations'];
        } else {
            // nada que exportar
            http_response_code(400);
            echo 'No hay reservas para exportar.';
            exit;
        }

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $headers = ['Reserva ID', 'Habitacion', 'Fecha de entrada', 'Fecha de salida', 'Monto', 'Solicitudes especiales'];
        $col = 'A';
        foreach ($headers as $h) {
            $activeWorksheet->setCellValue("{$col}1", $h);
            $col++;
        }

        $rowNum = 2;
        foreach ($rows as $row) {
            $activeWorksheet->setCellValue("A{$rowNum}", $row['id']);
            $activeWorksheet->setCellValue("B{$rowNum}", $row['habitacion']);
            $activeWorksheet->setCellValue("C{$rowNum}", $row['checkin']);
            $activeWorksheet->setCellValue("D{$rowNum}", $row['checkout']);
            $activeWorksheet->setCellValue("E{$rowNum}", $row['pay']);
            $activeWorksheet->setCellValue("F{$rowNum}", $row['specialrequest']);

            $rowNum++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="prueba.xlsx"');
        header('Cache-Control: max-age=0');
        header('Content-Type: application/v');
        $writer->save('php://output');
        exit();
    }
}

$rows = [
    ['id' => 3],
    ['id' => 4]
];
