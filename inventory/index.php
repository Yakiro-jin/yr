<?php
session_start();
require_once '../config/database.php';

// Check if user is logged in as admin
$isAdmin = isset($_SESSION['user_id']);

$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Papelería YR</title>
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
                <?php if ($isAdmin): ?>
                    <li><a href="../admin/logout.php" style="color: #ffcccb;">Cerrar Sesión (Admin)</a></li>
                <?php else: ?>
                    <li><a href="../admin/login.php">Soy Admin</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin: 2rem 0;">
        <h1>Inventario de Productos</h1>
        <?php if ($isAdmin): ?>
            <a href="create.php" class="btn">Nuevo Producto</a>
        <?php endif; ?>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <?php if ($isAdmin): ?>
                        <th>Acciones</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['description']) ?></td>
                            <td><?= htmlspecialchars($product['quantity']) ?></td>
                            <td>$<?= number_format($product['price'], 2) ?></td>
                            <?php if ($isAdmin): ?>
                                <td>
                                    <a href="delete.php?id=<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?= $isAdmin ? 5 : 4 ?>" class="text-center">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>
