<?php
include 'session_config.php';

$nextcloud_url = 'https://chittalk.de/ocs/v2.php/apps/notifications/api/v1/notifications';
$username = 'DEIN_ADMIN_USER';
$password = 'DEIN_ADMIN_PASSWORT';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $message = $_POST['message'];

    $data = [
        'subject' => 'Neue Benachrichtigung',
        'message' => $message
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $nextcloud_url);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['OCS-APIRequest: true']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_status == 200) {
        echo json_encode(["message" => "Benachrichtigung gesendet"]);
    } else {
        echo json_encode(["error" => "Fehler beim Senden: $http_status"]);
    }

    curl_close($ch);
}
?>
