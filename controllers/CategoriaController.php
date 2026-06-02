<?php
class CategoriaController
{
    private $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria(); //instanciamos
    }
    public function index()
    {
        $this->categoria->listar();
    }

    public function guardar()
    {
        $this->categoria->guardar($_POST['nombre'], $_POST['estado']);
    }

    public function editar()
    {
        $categoria = $this->categoria->obtenerPorId($_GET['id']);
    }

    public function actualizar()
    {
        $this->categoria->actualizar($_POST['id'], $_POST['nombre'], $_POST['estado']);
    }

    public function eliminar()
    {
        $this->categoria->eliminar($_GET['id']);
    }
}
