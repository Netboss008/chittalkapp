<?php
include 'config.php';

$stmt = $conn->prepare("SELECT email FROM users WHERE id IN (SELECT user1_id FROM matches UNION SELECT user2_id FROM matches)");
$stmt->execute();
$emails = $stmt->fetchAll(PDO::FETCH_COLUMN);

$subject = "Erinnerung: Ihr nächstes Match";
$message = "Vergessen Sie nicht Ihr Match! Melden Sie sich bei ChitTalk an.";

foreach ($emails as $email) {
    mail($email, $subject, $message);
}

echo json_encode(["message" => "Benachrichtigungen gesendet"]);
?>
