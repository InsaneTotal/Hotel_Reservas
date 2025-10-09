<?php

session_start();

require_once "controllers/index.controller.php";
require_once "config/config.php";
require_once "models/conexion.database.php";
require_once "models/user.model.php";
require_once "controllers/createUser.controller.php";

$indexController = new IndexController();
$authController = new AuthUser();
// 

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'registerUser') {
        $indexController->showIndex("views/html/auth/register.php");
    }
    if ($_GET['action'] == 'loginUser') {
        $indexController->showIndex("views/html/auth/login.php");
    }
    if ($_GET['action'] == 'createUser') {
        $indexController->registerUser($_POST);
    }
    if ($_GET['action'] == 'validateUser') {
        $authController->validateEmail($_POST);
    }
} else {
    // Aquí puedes manejar el caso cuando el usuario está autenticado
    // Por ejemplo, redirigir a una página de dashboard o similar
    $indexController->showIndex("views/html/home.php");
    // header("Location: views/html/dashboard.php"); // Descomenta esta línea para redirigir
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