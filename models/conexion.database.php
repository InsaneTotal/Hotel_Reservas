<?php

class Conexion_database
{
    private $mySQLI;
    private $sql;
    private $result;
    private $affectedRows;

    public function conect()
    {
        $this->mySQLI = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->mySQLI->connect_error) {
            throw new Exception("Error de conexión a la base de datos: " . $this->mySQLI->connect_error);
        }
        // No mostrar mensajes de conexión en producción
        // echo "Conectado a la base de datos";
    }

    public function desconect()
    {
        $this->mySQLI->close();
    }

    public function prepare($sql)
    {
        return $this->mySQLI->prepare($sql);
    }
}
