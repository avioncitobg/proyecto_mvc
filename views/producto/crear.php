<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC - CREAR</title>
</head>

<body>
    <div>
        <h1>Crear Producto</h1>
        <form action="../index.php?guardar" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required><br><br>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" step="1" required><br><br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>

</html>