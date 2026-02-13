
<?php


// CONFIGURACIÓN PARA DOCKER
// Toma los valores de variables de entorno o usa valores por defecto

$host = getenv('DB_HOST') ?: '192.168.100.100';        // Nombre del contenedor BD
$port = getenv('DB_PORT') ?: '5432';             // Puerto de la BD
$db   = getenv('DB_NAME') ?: 'papeleriadb';     // Nombre de tu BD
$user = getenv('DB_USER') ?: 'postgres';         // Usuario
$pass = getenv('DB_PASS') ?: 'admin123';                 // Contraseña

// Construir la cadena de conexión
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Mensaje de éxito (lo verás en logs)
    error_log("✅ Conectado a BD: $db en $host:$port");
    
} catch (\PDOException $e) {
    // Mensaje de error (lo verás en logs)
    error_log("❌ Error de conexión: " . $e->getMessage());
    die("Error de conexión a la base de datos. Revisa los logs.");
}



/*

$host = 'localhost';
$db   = 'papeleria_db'; // Change this to your actual DB name
$user = 'postgres';     // Change this to your actual DB user
$pass = '';     // Change this to your actual DB password
$port = "3000";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}*/
?>
