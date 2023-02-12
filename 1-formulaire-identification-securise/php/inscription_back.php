<?php
// ne pas afficher les erreurs aux utilisateurs
ini_set('display_errors', 0);
 ?>

<?php
session_start();
// vérification du jeton de sécurité
if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
//Si jeton session != au formulaire
  if(! $_SESSION['token'] == $_POST['token']) {
    // exécution du code
    header('Location: inscription.php');
    die();
  }
}
?>

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
        $stmt->bindParam(':username', $user, PDO::PARAM_STR);

        $stmt->execute();
        $result = $stmt->fetch();

        if(!$result) {
          $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
          $stmt = $db->prepare($sql);
          $stmt->bindParam(':username', $user,PDO::PARAM_STR);
          $stmt->bindParam(':password', $password, PDO::PARAM_STR);

          $stmt->execute();

          $_SESSION['message_inscription'] = "Inscription réussie.";
        } else {
          $_SESSION['message_inscription'] = "Erreur: Cet utilisateur existe déjà.";
        }
      } else {
        $_SESSION['message_inscription'] =  "Erreur: Le mot de passe doit comporter au moins 8 caractères, 1 chiffre, 1 majuscule, et 1 minuscule.";
      }
    } else {
      $_SESSION['message_inscription'] =  "Erreur: L'identifiant doit comporter au moins 4 caractères.";
    }
  } else {
    $_SESSION['message_inscription'] = "Erreur: L'identifiant et/ou le mot de passe sont vides.";
  }
}

?>

<?php
header('Location: inscription.php');
die();
 ?>
