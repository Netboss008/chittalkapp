<?php
$domain = 'https://chittalk.de';
$admin = 'Dj.Psycho';
$password = 'Postmann@126';

function listFiles() {
    global $domain, $admin, $password;
    $url = "$domain/remote.php/dav/files/$admin/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, "$admin:$password");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Depth: 1"]);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

echo listFiles();
?>
