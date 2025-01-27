<?php
$domain = 'https://chittalk.de';
$admin = 'Dj.Psycho';
$password = 'Postmann@126';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['group'])) {
    $group = $_POST['group'];

    $url = "$domain/ocs/v1.php/cloud/groups";
    $data = ['groupid' => $group];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, "$admin:$password");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['OCS-APIRequest: true']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;
}
?>
