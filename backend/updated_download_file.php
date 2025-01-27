<?php
include 'session_config.php';

$webdav_url = 'https://chittalk.de/remote.php/dav/files/Dj.Psycho/';
$username = 'DEIN_BENUTZERNAME';
$password = 'DEIN_PASSWORT';

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $fileUrl = $webdav_url . $fileName;

    $ch = curl_init($fileUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

    $fileData = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_status == 200) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        echo $fileData;
    } else {
        echo "Fehler beim Herunterladen der Datei: $http_status";
    }

    curl_close($ch);
}
?>
