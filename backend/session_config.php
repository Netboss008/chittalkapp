<?php
// Sicheres Sitzungsmanagement
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_lifetime', 3600);
session_start();
?>
