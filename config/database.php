<?php
$host = 'localhost';
$db   = 'papeleria_db'; // Change this to your actual DB name
$user = 'postgres';     // Change this to your actual DB user
$pass = 'postgres';     // Change this to your actual DB password
$port = "5432";

$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass";

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
