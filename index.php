<?php

require_once './controllers/ProductoController.php';
$controller = new ProductoController(); //instanciamos el controlador

if (isset($_GET['guardar'])) {
    // $controller->guardar();
} else {
    $controller->index();
}
