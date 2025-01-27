<?php
$log_file = "activity_log.txt";

$filter = isset($_GET['filter']) ? strtolower($_GET['filter']) : '';

$logs = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$result = [];

foreach ($logs as $log) {
    if (strpos(strtolower($log), $filter) !== false) {
        $result[] = $log;
    }
}

echo json_encode($result);
?>
