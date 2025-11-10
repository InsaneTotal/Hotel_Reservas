<?php

namespace App\Controllers;

class LogoutController
{
    public function logOut()
    {

        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
