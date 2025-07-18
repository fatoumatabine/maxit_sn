<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Création de compte client</title>
</head>
<body>
    <h1>Créer un compte client</h1>
    <form action="/account/create" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Créer le compte</button>
    </form>
</body>
</html>
