<?php
$email = "admin@chittalk.de";
$subject = "Neue Datei hochgeladen";
$message = "Eine neue Datei wurde auf ChitTalk hochgeladen.";
$headers = "From: noreply@chittalk.de";

if (mail($email, $subject, $message, $headers)) {
    echo json_encode(["message" => "Benachrichtigung gesendet"]);
} else {
    echo json_encode(["error" => "Fehler beim Senden"]);
}
?>
