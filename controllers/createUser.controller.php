<?php

class AuthUser
{
    public function validateEmail($data)
    {

        $user = new User();
        $result = $user->validateUser($data);
        if ($result !== null) {
            if (password_verify($data['password'], $result['contrasena'])) {
                $_SESSION['mensaje'] = 'Usuario conectado';
                $_SESSION['user_id'] = $data['num_document'];
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['mensaje'] = 'Usuario no conectado';
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
