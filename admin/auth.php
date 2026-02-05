<?php
session_start();
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../admin/login.php");
        exit;
    }
}
?>
