<?php
include 'session_config.php';

$webdav_url = 'https://chittalk.de/remote.php/dav/files/Dj.Psycho/';
$username = 'DEIN_BENUTZERNAME';
$password = 'DEIN_PASSWORT';
$admin_email = 'admin@chittalk.de';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $filePath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $webdav_url . $fileName);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_PUT, true);
    curl_setopt($ch, CURLOPT_INFILE, fopen($filePath, 'r'));
    curl_setopt($ch, CURLOPT_INFILESIZE, filesize($filePath));

    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_status == 201) {
        mail($admin_email, "Neue Datei hochgeladen", "Die Datei $fileName wurde hochgeladen.");
        echo json_encode(["message" => "Datei erfolgreich hochgeladen und Admin benachrichtigt"]);
    } else {
        echo json_encode(["error" => "Fehler beim Hochladen: $http_status"]);
    }

    curl_close($ch);
}
?>
