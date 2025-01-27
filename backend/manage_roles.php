<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['role'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE username = ?");
    $stmt->bind_param("ss", $role, $username);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Rolle erfolgreich aktualisiert"]);
    } else {
        echo json_encode(["error" => "Fehler beim Aktualisieren der Rolle"]);
    }
}
?>
