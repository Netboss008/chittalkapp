<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
</head>
<body>
    <h1>Registrierung</h1>
    <form method="POST" action="/index.php/apps/chittalk/register">
        <label for="firstname">Vorname:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="username">TikTok Nutzername:</label>
        <input type="text" id="username" name="username">

        <button type="submit">Registrieren</button>
    </form>
</body>
</html>
