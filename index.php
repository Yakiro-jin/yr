<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelería YR - Inicio</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="inventory/index.php">Inventario</a></li>
                <li><a href="upload/index.php">Imprimibles</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <div style="text-align: center; padding: 4rem 0;">
        <h1>Bienvenido a Papelería YR</h1>
        <p style="font-size: 1.2rem; margin-bottom: 2rem;">Todo lo que necesitas para tu oficina y escuela, ahora al alcance de un clic.</p>
        
        <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
            <div class="card" style="flex: 1; min-width: 300px; text-align: center;">
                <h3>📦 Gestión de Inventario</h3>
                <p>Administra tus productos, precios y stock de manera eficiente.</p>
                <a href="inventory/index.php" class="btn">Ir al Inventario</a>
            </div>

            <div class="card" style="flex: 1; min-width: 300px; text-align: center;">
                <h3>📂 Zona de Archivos</h3>
                <p>Sube y descarga archivos imprimibles para tus clientes.</p>
                <a href="upload/index.php" class="btn">Ir a Imprimibles</a>
            </div>
        </div>
    </div>
</main>

<footer style="background: #333; color: white; text-align: center; padding: 1rem 0; margin-top: auto;">
    <p>&copy; <?php echo date('Y'); ?> Papelería YR. Todos los derechos reservados.</p>
</footer>

</body>
</html>
