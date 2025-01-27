<?php
include 'session_config.php';

$webdav_url = 'https://chittalk.de/remote.php/dav/files/Dj.Psycho/';
$username = 'DEIN_BENUTZERNAME';
$password = 'DEIN_PASSWORT';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['file'])) {
    $fileName = $_POST['file'];
    $fileUrl = $webdav_url . $fileName;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $fileUrl);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_status == 204) {
        echo json_encode(["message" => "Datei erfolgreich gelöscht"]);
    } else {
        echo json_encode(["error" => "Fehler beim Löschen: $http_status"]);
    }

    curl_close($ch);
}
?>
