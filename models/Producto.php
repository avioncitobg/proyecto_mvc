<?php

require_once './conexion.php'; //para poder hacer persistencia a la db

class Producto
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function listar()
    {
        $sql = "SELECT * FROM productos"; //armamos la consulta sql para listar los productos
        $stmt = $this->conexion->conectar()->prepare($sql); //preparamos la consulta para evitar inyecciones sql
        $stmt->execute(); //ejecutamos la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //retornamos el resultado de la consulta como un array asociativo
    }

    public function guardar($nombre, $precio, $stock)
    {
        try {
            $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (:nombre, :precio, :stock)"; //armamos la consulta sql para guardar un nuevo producto
            $stmt = $this->conexion->conectar()->prepare($sql); //preparamos la consulta para evitar inyecciones sql
            $stmt->bindParam(':nombre', $nombre); //vinculamos los parametros de la consulta con los datos del formulario
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute(); //ejecutamos la consulta
        } catch (\Exception $e) {
            echo ("Error al guardar el producto: " . $e->getMessage());
        }
    }

    public function actualizar($id, $nombre, $precio, $stock)
    {
        try {
            $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, stock = :stock WHERE id = :id";
            $stmt = $this->conexion->conectar()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
        } catch (\Exception $e) {
            echo ("Error al actualizar el producto: " . $e->getMessage());
        }
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->conexion->conectar()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $this->conexion->conectar()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo ("Error al eliminar el producto: " . $e->getMessage());
        }
    }
}
