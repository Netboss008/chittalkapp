<?php
include 'session_config.php';

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $role = $_POST['role'];

    $allowedRoles = ['user', 'streamer', 'moderator', 'supporter', 'agency'];
    if (!in_array($role, $allowedRoles)) {
        die(json_encode(["error" => "Ungültige Rolle"]));
    }

    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE email = ?");
    if ($stmt->execute([$role, $email])) {
        echo json_encode(["message" => "Rolle erfolgreich aktualisiert"]);
    } else {
        echo json_encode(["error" => "Fehler beim Aktualisieren der Rolle"]);
    }
}
?>
