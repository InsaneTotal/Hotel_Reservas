<?php

const DB_HOST = "localhost";
const DB_NAME = "hotel_reservas";
const DB_USER = "root";
const DB_PASSWORD = "102892";
const SITE_URL = "http://localhost/hotel_reservas/";

if (!defined('FPDF_FONTPATH')) {
    define('FPDF_FONTPATH', __DIR__ . '/../lib/tfpdf/font/');
}

// definir ruta a fuentes TTF del sistema para tFPDF
if (!defined('_SYSTEM_TTFONTS')) {
    // ajusta la ruta si usas otra ubicación
    define('_SYSTEM_TTFONTS', __DIR__ . '/../lib/tfpdf/font/unifont' . DIRECTORY_SEPARATOR);
}
