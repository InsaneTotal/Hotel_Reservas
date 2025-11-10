<?php

session_start();



require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/vendor/autoload.php";
require_once "lib/fpdf/fpdf.php";


use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer\PHPMailer\PHPMailer();
$indexController = new \App\Controllers\IndexController();
$authController = new \App\Controllers\AuthUserController();
$logoutController = new \App\Controllers\LogoutController();
$newReController = new \App\Controllers\NewReController();
$roomsController = new \App\Controllers\RoomsController();
$reservationListController = new \App\Controllers\ReservationListController();
$excelController = new \App\Controllers\ExcelController();
$mailController = new \App\Controllers\MailController();
$editeController = new \App\Controllers\EditeController();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


switch ($_GET['action'] ?? null) {
    case 'reservaData':
        $reservationListController->getReservationData($_POST['reserva_id']);
        break;
    case 'enviarEmail':
        $mailController->sendReservationEmail($_POST['user_id']);
        break;
    case 'generarexcel':
        $excelController->generateExcel();
        break;
    case 'mostrarreservas':
        $indexController->showIndex("views/html/auth/reservationList.php");
        break;
    case 'createReservation':
        $newReController->createReservation($_POST);
        break;
    case 'nuevareserva':
        $indexController->showIndex("views/html/auth/newReservation.php");
        break;
    case 'editarReserva':
        $editeController->updateReservation($_POST);
        break;
    case 'getAvailableRooms':
        $roomsController->getAvailableRooms($_POST['nameRoom']);
        break;
    case 'reservationForm':
        $indexController->showIndex("views/html/auth/newReservation.php");
        break;
    case 'misreservas':
        $reservationListController->getUserReservations();
        break;
    case 'registerUser':
        $indexController->showIndex("views/html/auth/register.php");
        break;
    case 'loginUser':
        $indexController->showIndex("views/html/auth/login.php");
        break;
    case 'createUser':
        $indexController->registerUser($_POST);
        break;
    case 'validateUser':
        $authController->validateEmail($_POST);
        break;
    case 'validateReservation':
        $newReController->createReservation($_POST);
        break;
    case 'logout':
        $logoutController->logOut();
        break;
    default:
        unset($_SESSION['errors'], $_SESSION['old']);
        $indexController->showIndex("views/html/home.php");
        break;
}


/*POST=[
    'action'=>'registerUser',
    'tipo_documento'=>'cedula',
    'numero_documento'=>'4563456456',
    'nombre'=>'Sebastian',
    'apellido'=>'Gonzalez',
    'telefono'=>'1234567890',
    'email'=>'
]
*/