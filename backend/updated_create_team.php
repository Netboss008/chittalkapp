<?php
include 'config.php';
include 'session_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $team_name = $_POST['team_name'];
    $leader_id = $_POST['leader_id'];

    $stmt = $conn->prepare("INSERT INTO teams (team_name, leader_id) VALUES (?, ?)");
    if ($stmt->execute([$team_name, $leader_id])) {
        echo json_encode(["message" => "Team erfolgreich erstellt"]);
    } else {
        echo json_encode(["error" => "Fehler beim Erstellen des Teams"]);
    }
}
?>
