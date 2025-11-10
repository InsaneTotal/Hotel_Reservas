<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthUserController
{
    public function validateEmail($data)
    {

        $user = new UserModel();
        $result = $user->validateUser($data);
        if ($result !== null) {
            if (password_verify($data['password'], $result['contrasena'])) {
                $_SESSION['mensaje'] = 'Usuario conectado';
                $_SESSION['user_data'] = ['id' => $result['id'], 'full_name' => $result['nombre'] . " " . $result['apellido'], 'email' => $result['correo']];
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['mensaje'] = 'Contraseña incorrecta';
                header('Location: index.php?action=loginUser');
                exit;
            }
        } else {
            $_SESSION['error'] = 'Correo no encontrado';
            header('Location: index.php?action=loginUser');
            exit;
        }
    }
}
