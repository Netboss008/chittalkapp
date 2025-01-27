<?php
include 'session_config.php';
include 'session_config.php';


$webdav_url = 'https://chittalk.de/remote.php/dav/files/Dj.Psycho/';
$username = 'DEIN_BENUTZERNAME';
$password = 'DEIN_PASSWORT';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_folder'])) {
    $folderName = $_POST['user_folder'];
    $folderUrl = $webdav_url . $folderName . "/";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $folderUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "MKCOL");

    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_status == 201) {
        echo json_encode(["message" => "Ordner erfolgreich erstellt"]);
    } else {
        echo json_encode(["error" => "Fehler beim Erstellen des Ordners: $http_status"]);
    }

    curl_close($ch);
}
?>
