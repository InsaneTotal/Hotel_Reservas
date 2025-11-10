<?php

namespace App\Controllers;

class CrudController
{
    public function validateData($data)
    {
        $errors = [];
        if (empty($data['checkin'])) {
            $errors['checkin'] = 'Fecha de ingreso necesaria';
        }
    }
}
