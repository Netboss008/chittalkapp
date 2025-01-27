<?php
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new Exception("Ungültiger Sicherheits-Token");
        }

        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
        $file = $_FILES['file'];

        if (!in_array($file['type'], $allowed_types)) {
            throw new Exception("Ungültiges Dateiformat");
        }

        if ($file['size'] > 5000000) { // 5MB max
            throw new Exception("Datei ist zu groß.");
        }

        $upload_dir = 'uploads/';
        $new_file_name = $upload_dir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $new_file_name)) {
            echo json_encode(["message" => "Datei erfolgreich hochgeladen"]);
        } else {
            throw new Exception("Fehler beim Hochladen");
        }
    } else {
        throw new Exception("Ungültige Anfrage");
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
