<?php

namespace App\Models;

class UserModel
{


    public function validateUser($data)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stmt = $conexion->prepare("SELECT * FROM users WHERE correo = ?");
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }
        $stmt->bind_param('s', $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function registerUser($data)
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();

        $stmt = $conexion->prepare(
            "INSERT INTO users (num_document, id_type_document, nombre, apellido, telefono, correo, contrasena) 
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $password;
        $stmt->bind_param(
            "sisssss",
            $data['numero_documento'],
            $data['tipo_documento'],
            $data['nombre'],
            $data['apellido'],
            $data['telefono'],
            $data['email'],
            $data['password']
        );
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        $conexion->desconect();

        return $affectedRows;
    }

    public function getPassword()
    {
        $conexion = new ConexionDatabase();
        $conexion->conect();
        $stmt = $conexion->prepare("SELECT * FROM users WHERE correo = ?");
        if (!$stmt) {
            $conexion->desconect();
            return 0;
        }
    }
}
