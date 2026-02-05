<?php
require_once '../config/database.php';

$stmt = $pdo->query("SELECT * FROM files ORDER BY uploaded_at DESC");
$files = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimibles - Papelería YR</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../inventory/index.php">Inventario</a></li>
                <li><a href="index.php">Imprimibles</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <h1 style="margin-top: 2rem;">Archivos Imprimibles</h1>

    <!-- Upload Form -->
    <div class="card">
        <h3>Subir Nuevo Archivo</h3>
        <form action="handler.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Seleccionar Archivo:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <button type="submit" class="btn">Subir Archivo</button>
        </form>
    </div>

    <!-- File List -->
    <div class="card">
        <h3>Archivos Disponibles</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Fecha de Subida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($files) > 0): ?>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td><?= htmlspecialchars($file['filename']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($file['uploaded_at'])) ?></td>
                            <td>
                                <a href="../uploads/<?= htmlspecialchars($file['filename']) ?>" class="btn" target="_blank" download>Descargar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No hay archivos subidos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>
