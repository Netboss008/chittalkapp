<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(["error" => "Ungültiger Sicherheits-Token"]));
    }

    $username = htmlspecialchars($_POST['username']);
    echo json_encode(["message" => "Erfolgreich verarbeitet, Benutzer: $username"]);
}
?>
