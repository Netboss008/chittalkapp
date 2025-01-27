<?php
$log_file = 'activity_log.txt';

$logs = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$uploads = substr_count(implode(" ", $logs), "upload");
$downloads = substr_count(implode(" ", $logs), "download");

$response = [
    "uploads" => $uploads,
    "downloads" => $downloads
];

echo json_encode($response);
?>
