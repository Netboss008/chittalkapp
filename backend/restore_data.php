<?php
$backup_dir = "/path/to/backup/";
$restore_file = $backup_dir . "backup_latest.tar.gz";
$target_dir = "/var/www/nextcloud/data/";

exec("tar -xzf $restore_file -C $target_dir", $output, $return_var);

if ($return_var === 0) {
    echo json_encode(["message" => "Backup erfolgreich wiederhergestellt"]);
} else {
    echo json_encode(["error" => "Fehler bei der Wiederherstellung"]);
}
?>
