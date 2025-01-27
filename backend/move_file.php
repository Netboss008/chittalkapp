<?php
$domain = 'https://chittalk.de';
$admin = 'Dj.Psycho';
$password = 'Postmann@126';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['old_path']) && isset($_POST['new_path'])) {
    $oldPath = "$domain/remote.php/dav/files/$admin/" . $_POST['old_path'];
    $newPath = "$domain/remote.php/dav/files/$admin/" . $_POST['new_path'];

    $ch = curl_init($oldPath);
    curl_setopt($ch, CURLOPT_USERPWD, "$admin:$password");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "MOVE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Destination: $newPath"]);

    $response = curl_exec($ch);
    curl_close($ch);

    echo json_encode(["message" => "Datei verschoben"]);
}
?>
