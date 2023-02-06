<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <header>
        <img src="logo.png" alt="Logo" class="logo">
      </header>
      <div class="container">
      <form action="php/connexion.php" method="post">
        <input type="text" placeholder="Identifiant" name="user">
        <input type="password" placeholder="Mot de passe" name="mdp">
        <div class="buttons">
          <button type="reset">Réinitialiser</button>
          <button type="submit">Valider</button>
          <button type="button" onclick="window.location.href='php/inscription.php'">Ajout compte</button>
        </div>
      </form>
    </div>

  </body>
</html>
