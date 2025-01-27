# ChitTalk Projekt

Dies ist die README-Datei für die ChitTalk-App.

Weitere Informationen folgen bald.

# ChitTalk.de - Cloud- und Community-Plattform

## Installation

1. **Dateien hochladen**  
   - Lade den `app/` Ordner auf deinen Server in das gewünschte Verzeichnis hoch.

2. **Nextcloud-Integration konfigurieren**  
   - Bearbeite die Datei `config.php` und füge deine Nextcloud-URL und Zugangsdaten ein.

3. **Datenbank einrichten**  
   - Importiere die SQL-Datei in phpMyAdmin.

4. **Sicherheitseinstellungen**  
   - Stelle sicher, dass `session_config.php` in alle PHP-Dateien eingebunden ist.

5. **Cron-Job für automatische Backups einrichten**  
   - Siehe Anleitung unter `backup.html`.

## Nutzung

- **Dateien hochladen:**  
  Gehe zu `frontend/upload_form.html`.

- **Benutzer verwalten:**  
  Nutze `frontend/manage_roles.html`.

- **Backups erstellen:**  
  Siehe `frontend/backup.html`.

## Sicherheitshinweise

- Nutze sichere Passwörter.  
- Verwende HTTPS für verschlüsselte Kommunikation.  
- Beschränke Dateitypen für Uploads.

## Support

Falls du Fragen hast, kontaktiere uns unter support@chittalk.de.
>>>>>>> d0ff788 (Initial commit)
