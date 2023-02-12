<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <?php

  session_start();

  $token = uniqid(rand(), true); // jeton unique
  //$token = 11;
  $_SESSION['token'] = $token; // stockage
  // heure de création du jeton
  $_SESSION['token_time'] = time();

   ?>

  <body>
      <div class="container">
      <h1>Inscription</h1>
      <form action="inscription_back.php" method="post">
        <img src="../img/logo.png" alt="Logo" class="logo">

        <input type="text" placeholder="Identifiant" name="user">
        <input type="password" placeholder="Mot de passe" name="mdp">
        <div class="buttons">
          <button type="reset">Réinitialiser</button>
          <button type="submit">Valider</button>
          <button type="button" onclick="window.location.href='../index.php'">Se connecter</button>
        </div>
        <input type="hidden" name="token"
        id="token" value="<?php echo $token;?>"/>
      </form>
      <?php if (isset($_SESSION['message_inscription'])) {
          echo $_SESSION['message_inscription'];
      } ?>
      </form>


    </div>
  </body>
</html>
