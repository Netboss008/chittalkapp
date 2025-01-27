<?php
include 'config.php';
include 'session_config.php';


session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die(json_encode(["error" => "Ungültiger Sicherheits-Token"]));
    }

    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(json_encode(["error" => "Ungültige E-Mail-Adresse"]));
    }

    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Benutzer erfolgreich hinzugefügt"]);
    } else {
        echo json_encode(["error" => "Fehler beim Speichern"]);
    }
}
?>
