<?php

class IndexController
{
    public function showIndex($index)
    {

        include_once $index;
    }

    public function validateData($dataV)
    {
        $errors = [];

        if (!isset($dataV['tipo_documento']) || $dataV["tipo_documento"] === '') {
            $errors['tipo_documento'] = 'Tipo de documento requerido';
        }
        if (empty(trim($dataV['numero_documento'] ?? ''))) {
            $errors['numero_document'] = "Documento requerido";
        }
        if (empty(trim($dataV['nombre'] ?? ''))) {
            $errors['nombre'] = "Nombre requerido";
        }
        if (empty(trim($dataV['apellido'] ?? ''))) {
            $errors['apellido'] = "Apellido requerido";
        }
        if (empty(trim($dataV['telefono'] ?? ''))) {
            $errors['telefono'] = "Telefono requerido";
        }
        if (empty(trim($dataV['email'] ?? ''))) {
            $errors['email'] = "Correo requerido";
        }
        if (empty(trim($dataV['password'] ?? ''))) {
            $errors['contraseña'] = "Contraseña requerida";
        } else if (strlen(trim($dataV['password'])) < 6) {
            $errors['contrasena'] = 'La contraseña debe contener al menos 6 caracteres';
        }
        return $errors;
    }

    public function registerUser($dataR)
    {
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        unset($_SESSION['success']);

        $errors = $this->validateData($dataR);
        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $dataR;

            header('Location: ' . SITE_URL . 'index.php?action=registerUser');
            exit;
        }

        $user = new User();
        $existe = $user->validateUser($dataR);
        if ($existe !== null) {
            $_SESSION['errors'] = ['general' => 'El ususario ya existe.'];
            $_SESSION['old'] = $dataR;
            header('Location: ' . SITE_URL . 'index.php?action=registerUser');
            exit;
        }
        $resultado = $user->registerUser($dataR);
        if ($resultado > 0) {
            $_SESSION['success'] = 'Usuario registrado exitosamente';
            header('Location:' . SITE_URL . 'index.php?action=loginUser');
            exit();
        } else {
            $_SESSION['errors'] = ['general' => 'Error al registrar el usuario. Intentalo de nuevo'];
            $_SESSION['old'] = $dataR;
            header('Location: ' . SITE_URL . ' index.php?action=registerUser');
            exit();
        }
    }
}
