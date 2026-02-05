<?php
require_once '../admin/auth.php';
requireLogin(); // Protect this route

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $quantity, $price]);
        
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        die("Error al guardar producto: " . $e->getMessage());
    }
} else {
    header("Location: create.php");
    exit;
}
?>
