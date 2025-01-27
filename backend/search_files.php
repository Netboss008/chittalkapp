<?php
include 'session_config.php';

$directory = 'https://chittalk.de/remote.php/dav/files/Dj.Psycho/';
$username = 'DEIN_BENUTZERNAME';
$password = 'DEIN_PASSWORT';

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $directory);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Depth: 1"]);

    $response = curl_exec($ch);

    if ($response) {
        $files = [];
        preg_match_all('/<d:href>(.*?)<\/d:href>/', $response, $matches);
        foreach ($matches[1] as $file) {
            if (strpos($file, $query) !== false) {
                $files[] = $file;
            }
        }
        echo json_encode($files);
    } else {
        echo json_encode(["error" => "Keine Dateien gefunden"]);
    }

    curl_close($ch);
}
?>
