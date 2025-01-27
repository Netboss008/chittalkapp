<?php
include 'config.php';
include 'session_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user1 = $_POST['user1_id'];
    $user2 = $_POST['user2_id'];
    $match_time = $_POST['match_time'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("INSERT INTO matches (user1_id, user2_id, match_time, notes) VALUES (?, ?, ?, ?)");
    
    if ($stmt->execute([$user1, $user2, $match_time, $notes])) {
        echo json_encode(["message" => "Match erfolgreich erstellt"]);
    } else {
        echo json_encode(["error" => "Fehler beim Erstellen des Matches"]);
    }
}
?>
