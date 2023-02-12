<?php
session_start();
// vérification du jeton de sécurité
if(isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
//Si jeton session != au formulaire
  if(! $_SESSION['token'] == $_POST['token']) {
    // exécution du code
    header('Location: index.php');
    die();
  }
}
?>

<?php

require_once("functions_db.php");

if(isset($_POST['user']) && isset($_POST['mdp'])) {
  if($_POST['user'] !== '' && $_POST['mdp'] !== '') {

    if(!isset($_SESSION['failed_attempts'])) {
      $_SESSION['failed_attempts'] = 0;
    }

    if($_SESSION['failed_attempts'] < 3) {
      connect_db();

      $user = htmlspecialchars($_POST['user']);
      $password = htmlspecialchars($_POST['mdp']);


      $sql = "SELECT * FROM users WHERE username = :username";
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':username', $user, PDO::PARAM_STR);

      // ralentir brute force
      sleep(1);

      $stmt->execute();
      $result = $stmt->fetch();

      if($result && password_verify($password, $result['password'])) {
        // Utilisateur trouvé
        $_SESSION['message_connexion'] = "Connexion réussie";
      } else {
        // Utilisateur non trouvé
        $_SESSION['failed_attempts']++;
        $_SESSION['message_connexion'] = "Connexion échouée : L'identifiant et/ou le mot de passe sont incorrects. Nombre de tentatives restantes : " . (3-$_SESSION['failed_attempts']);
        if($_SESSION['failed_attempts'] >= 3) {
          $_SESSION['block_time'] = time() + 180;
        }
      }
    } else if(isset($_SESSION['block_time']) && time() < $_SESSION['block_time']) {
      $_SESSION['message_connexion'] = "Vous avez échoué trop de fois, veuillez réessayer dans " . ($_SESSION['block_time'] - time()) . " secondes.";
    } else {
      unset($_SESSION['failed_attempts']);
      unset($_SESSION['block_time']);
    }
  } else {
    $_SESSION['message_connexion'] = "Erreur: L'identifiant et/ou le mot de passe sont vides.";
  }
}

?>

<?php
header('Location: index.php');
die();
 ?>
