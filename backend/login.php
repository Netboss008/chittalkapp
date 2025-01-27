<?php
session_start();
$domain = 'https://chittalk.de';
$admin = 'Dj.Psycho';
$password = 'Postmann@126';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];

    if ($input_user === $admin && $input_pass === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $admin;
        echo json_encode(["message" => "Login erfolgreich"]);
    } else {
        echo json_encode(["error" => "Ungültige Anmeldeinformationen"]);
    }
}
?>
