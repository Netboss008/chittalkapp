<?php
$domain = 'https://chittalk.de';
$admin = 'Dj.Psycho';
$password = 'Postmann@126';

function getMatches() {
    global $domain, $admin, $password;
    // Beispiel-API-Aufruf zur Abrufung der Matches
    $url = "$domain/api/matches";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, "$admin:$password");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

print_r(getMatches());
?>
