<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user']) && isset($_POST['action'])) {
    $user = $_POST['user'];
    $action = $_POST['action'];

    if ($action === 'delete') {
        $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
        $stmt->bind_param("s", $user);
        if ($stmt->execute()) {
            echo json_encode(["message" => "Benutzer gelöscht"]);
        } else {
            echo json_encode(["error" => "Fehler beim Löschen"]);
        }
    }
}
?>
