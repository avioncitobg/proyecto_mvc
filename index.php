<?php

require_once './controllers/ProductoController.php';
$controller = new ProductoController(); //instanciamos el controlador

if (isset($_GET['guardar'])) {
    $controller->guardar();
}elseif (isset($_GET['editar'])) {
    // $controller->editar(); 
}elseif (isset($_GET['eliminar'])) {
    // $controller->eliminar();
} else {
    $controller->index();
}
