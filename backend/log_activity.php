<?php
$log_file = 'activity_log.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && isset($_POST['file'])) {
    $action = $_POST['action'];
    $file = $_POST['file'];
    $user = $_POST['user'] ?? 'Unbekannt';
    $timestamp = date('Y-m-d H:i:s');

    $log_entry = "[$timestamp] - Benutzer: $user, Aktion: '$action' auf Datei '$file'\n";

    file_put_contents($log_file, $log_entry, FILE_APPEND);

    echo json_encode(["message" => "Aktion protokolliert"]);
}
?>
