<?php
require_once '../admin/auth.php';
requireLogin(); // Protect this route

require_once '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        die("Error al eliminar producto: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit;
}
?>
