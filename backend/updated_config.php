<?php
$host = 'localhost';
$dbname = 'nextcloud_831cdac6';
$username = 'ncuser_831cdac6';
$password = '!jsg!I30$4A2FtfGL6';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}
?>
