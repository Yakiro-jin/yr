<?php
require_once '../admin/auth.php';
requireLogin(); // Protect this page
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto - Inventario</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="index.php">Inventario</a></li>
                <li><a href="../upload/index.php">Imprimibles</a></li>
                <li><a href="../admin/logout.php" style="color: #ffcccb;">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <h1 style="margin-top: 2rem;">Agregar Nuevo Producto</h1>

    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <form action="store.php" method="POST">
            <div class="form-group">
                <label for="name">Nombre del Producto:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" rows="3"></textarea>
            </div>

            <div class="form-group" style="display: flex; gap: 1rem;">
                <div style="flex: 1;">
                    <label for="quantity">Cantidad:</label>
                    <input type="number" id="quantity" name="quantity" min="0" required>
                </div>
                <div style="flex: 1;">
                    <label for="price">Precio Unitario:</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required>
                </div>
            </div>

            <div style="margin-top: 1.5rem; text-align: right;">
                <a href="index.php" class="btn" style="background-color: #777;">Cancelar</a>
                <button type="submit" class="btn">Guardar Producto</button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
