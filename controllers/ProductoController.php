<?php

require_once './models/Producto.php'; //para poder usar el modelo de Producto

class ProductoController
{
    private $producto;

    public function __construct()
    {
        $this->producto = new Producto(); //instanciamos
    }

    public function index()
    {
        $productos = $this->producto->listar(); //ejecutamo el metodo desde el modelo
        include './views/listar.php'; //incluimos la vista
    }

    public function guardar()
    {
        $this->producto->guardar($_POST['nombre'], $_POST['precio'], $_POST['stock']); //ejecutamos el metodo guardar del modelo, pasandole los datos del formulario
        header('Location: index.php');
    }

    public function editar()
    {
       $producto = $this->producto->obtenerPorId($_GET['id']); //obtenemos el producto por su id para mostrarlo en el formulario de edición
       include './views/editar.php'; //incluimos la vista de edición
    }

    public function actualizar()
    {
        $this->producto->actualizar($_POST['id'], $_POST['nombre'], $_POST['precio'], $_POST['stock']);
        header('Location: index.php');
    }
}
