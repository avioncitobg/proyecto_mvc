<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC - EDITAR</title>
</head>
<body>
    <div>
        <h1>Editar Producto</h1>
        <form action="index.php?actualizar" method="POST">
            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>" required><br><br>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" value="<?= $producto['precio'] ?>" required><br><br>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" step="1" value="<?= $producto['stock'] ?>" required><br><br>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>