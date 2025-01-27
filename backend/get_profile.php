<?php
$domain = 'https://chittalk.de';
$admin = 'Dj.Psycho';
$password = 'Postmann@126';

function getProfile($username) {
    global $domain, $admin, $password;
    $url = "$domain/api/profile?user=$username";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, "$admin:$password");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$username = $_GET['user'] ?? 'default_user';
print_r(getProfile($username));
?>
