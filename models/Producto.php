<?php

require_once './conexion.php'; //para poder hacer persistencia a la db

class Producto
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function listar(){
        $sql = "SELECT * FROM productos"; //armamos la consulta sql para listar los productos
        $stmt = $this->conexion->conectar()->prepare($sql); //preparamos la consulta para evitar inyecciones sql
        $stmt->execute(); //ejecutamos la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //retornamos el resultado de la consulta como un array asociativo
    }
}
