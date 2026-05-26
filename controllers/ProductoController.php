<?php

require_once './models/Producto.php'; //para poder usar el modelo de Producto

class ProductoController{
    private $producto;

    public function __construct()
    {
        $this->producto = new Producto(); //instanciamos
    }

    public function index(){
        $productos = $this->producto->listar(); //ejecutamo el metodo desde el modelo
        include './views/listar.php'; //incluimos la vista
    }
}