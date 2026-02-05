<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    // Check for errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error al subir archivo. Código: " . $file['error']);
    }

    $uploadDir = '../uploads/';
    // Ensure filename is safe and unique to prevent overwriting
    $filename = basename($file['name']);
    $filename = preg_replace('/[^A-Za-z0-9.\-_]/', '', $filename); // Sanitize
    $targetPath = $uploadDir . $filename;
    
    // If file exists, append timestamp
    if (file_exists($targetPath)) {
        $filename = time() . '_' . $filename;
        $targetPath = $uploadDir . $filename;
    }

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO files (filename, filepath) VALUES (?, ?)");
            $stmt->execute([$filename, $targetPath]);
            
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            die("Error al guardar en base de datos: " . $e->getMessage());
        }
    } else {
        die("Error al mover el archivo subido.");
    }
} else {
    header("Location: index.php");
    exit;
}
?>
