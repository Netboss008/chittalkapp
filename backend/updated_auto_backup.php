<?php
$backup_dir = "/path/to/backup/";
$source_dir = "/var/www/nextcloud/data/";

$backup_file = $backup_dir . "backup_" . date('Y-m-d_H-i-s') . ".tar.gz";

exec("tar -czf $backup_file $source_dir", $output, $return_var);

if ($return_var === 0) {
    echo "Backup erfolgreich erstellt: $backup_file\n";
    file_put_contents("backup_log.txt", "[" . date('Y-m-d H:i:s') . "] Backup erfolgreich: $backup_file\n", FILE_APPEND);
} else {
    echo "Fehler beim Backup\n";
    file_put_contents("backup_log.txt", "[" . date('Y-m-d H:i:s') . "] Fehler beim Backup\n", FILE_APPEND);
}
?>
