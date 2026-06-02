<?php
class MarcaController
{
    private $marca;

    public function __construct()
    {
        $this->marca = new Marca(); //instanciamos
    }
    public function index()
    {
        $this->marca->listar();
    }

    public function guardar()
    {
        $this->marca->guardar($_POST['nombre'], $_POST['estado']);
    }

    public function editar()
    {
        $marca = $this->marca->obtenerPorId($_GET['id']);
    }

    public function actualizar()
    {
        $this->marca->actualizar($_POST['id'], $_POST['nombre'], $_POST['estado']);
    }

    public function eliminar()
    {
        $this->marca->eliminar($_GET['id']);
    }
}