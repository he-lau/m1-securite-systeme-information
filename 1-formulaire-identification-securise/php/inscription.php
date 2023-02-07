<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
      <div class="container">
      <h1>Inscription</h1>
      <form action="#" method="post">
        <img src="img/logo.png" alt="Logo" class="logo">

        <input type="text" placeholder="Identifiant" name="user">
        <input type="password" placeholder="Mot de passe" name="mdp">
        <div class="buttons">
          <button type="reset">Réinitialiser</button>
          <button type="submit">Valider</button>
          <button type="button" onclick="window.location.href='../index.php'">Se connecter</button>
        </div>
      </form>

      <?php

      require_once("functions_db.php");

      if(isset($_POST['user']) && isset($_POST['mdp'])) {
        if($_POST['user'] !== '' && $_POST['mdp'] !== '') {
          if(strlen($_POST['user']) >= 4) {
            if(strlen($_POST['mdp']) >= 8 && preg_match("#[0-9]+#", $_POST['mdp']) && preg_match("#[a-z]+#", $_POST['mdp']) && preg_match("#[A-Z]+#", $_POST['mdp'])) {
              connect_db();

              $user = htmlspecialchars($_POST['user']);
              $password = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_BCRYPT);

              $sql = "SELECT * FROM users WHERE username = :username";
              $stmt = $db->prepare($sql);
              $stmt->bindParam(':username', $user);

              $stmt->execute();
              $result = $stmt->fetch();

              if(!$result) {
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':username', $user);
                $stmt->bindParam(':password', $password);

                $stmt->execute();

                echo "Inscription réussie.";
              } else {
                echo "Erreur: Cet utilisateur existe déjà.";
              }
            } else {
              echo "Erreur: Le mot de passe doit comporter au moins 8 caractères, 1 chiffre, 1 majuscule, et 1 minuscule.";
            }
          } else {
            echo "Erreur: L'identifiant doit comporter au moins 4 caractères.";
          }
        } else {
          echo "Erreur: L'identifiant et/ou le mot de passe sont vides.";
        }
      }

      ?>


    </div>
  </body>
</html>
