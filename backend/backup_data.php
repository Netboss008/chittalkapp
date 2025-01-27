<?php
$backup_dir = "/path/to/backup/";
$source_dir = "/var/www/nextcloud/data/";

$backup_file = $backup_dir . "backup_" . date('Y-m-d_H-i-s') . ".tar.gz";

exec("tar -czf $backup_file $source_dir", $output, $return_var);

if ($return_var === 0) {
    echo json_encode(["message" => "Backup erfolgreich erstellt: $backup_file"]);
} else {
    echo json_encode(["error" => "Fehler beim Backup"]);
}
?>
