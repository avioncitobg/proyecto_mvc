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

    public function guardar($nombre,$precio,$stock){
        try {
            $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)"; //armamos la consulta sql para guardar un nuevo producto
            $stmt = $this->conexion->conectar()->prepare($sql); //preparamos la consulta para evitar inyecciones sql
            $stmt->bindParam(':nombre', $nombre); //vinculamos los parametros de la consulta con los datos del formulario
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute(); //ejecutamos la consulta
        } catch (\Exception $e) {
            die("Error al guardar el producto: " . $e->getMessage());
        }
    }
}
