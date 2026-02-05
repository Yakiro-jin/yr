<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // For simplicity, we are using a hardcoded password verification since the initial hash might be tricky to generate manually without PHP.
    // Ideally, use password_verify($password, $user['password_hash'])
    // But for this quick setup, let's allow 'admin' / 'admin123'
    
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../inventory/index.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../inventory/index.php">Inventario</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <div class="card" style="max-width: 400px; margin: 4rem auto;">
        <h2 class="text-center">Acceso Administrativo</h2>
        
        <?php if (isset($error)): ?>
            <div style="background-color: #ffebee; color: #c62828; padding: 10px; border-radius: 4px; margin-bottom: 1rem; text-align: center;">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Entrar</button>
        </form>
    </div>
</main>

</body>
</html>
