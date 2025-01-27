<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user']) && isset($_POST['email'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE username = ?");
    $stmt->bind_param("ss", $email, $user);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Profil aktualisiert"]);
    } else {
        echo json_encode(["error" => "Fehler bei der Aktualisierung"]);
    }
}
?>
