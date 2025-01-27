<?php
include 'session_config.php';

session_start();

// Generiere ein CSRF-Token, falls es noch nicht existiert
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

echo json_encode(["token" => $_SESSION['csrf_token']]);
?>
