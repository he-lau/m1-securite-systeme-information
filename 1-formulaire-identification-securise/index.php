<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <div class="container">
                <h1>Connexion</h1>
      <form action="index.php" method="post">
        <img src="img/logo.png" alt="Logo" class="logo">

        <input type="text" placeholder="Identifiant" name="user">
        <input type="password" placeholder="Mot de passe" name="mdp">
        <div class="buttons">
          <button type="reset">Réinitialiser</button>
          <button type="submit">Valider</button>
          <button type="button" onclick="window.location.href='php/inscription.php'">S'inscrire</button>
        </div>
      </form>

      <?php require_once("php/connexion.php") ?>

    </div>
  </body>
</html>
