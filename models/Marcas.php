<?php 

class Marca
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function listar()
    {
        $sql = "SELECT * FROM marcas";
        $stmt = $this->conexion->conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($nombre, $estado)
    {
        try {
            $sql = "INSERT INTO marcas (nombre, estado) VALUES (:nombre, :estado)";
            $stmt = $this->conexion->conectar()->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
        } catch (\Exception $e) {
            echo ("Error al guardar la marca: " . $e->getMessage());
        }
    }

    public function obtenerPorId($id)
    {
        try {
            $sql = "SELECT * FROM marcas WHERE id = :id";
            $stmt = $this->conexion->conectar()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo ("Error al obtener la marca: " . $th->getMessage());
        }
    }

    public function actualizar($id, $nombre, $estado)
    {
        try {
            $sql = "UPDATE marcas SET nombre = :nombre, estado = :estado WHERE id = :id";
            $stmt = $this->conexion->conectar()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
        } catch (\Exception $e) {
            echo ("Error al actualizar la marca: " . $e->getMessage());
        }
    }

    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM marcas WHERE id = :id";
            $stmt = $this->conexion->conectar()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo ("Error al eliminar la marca: " . $e->getMessage());
        }

    }

}