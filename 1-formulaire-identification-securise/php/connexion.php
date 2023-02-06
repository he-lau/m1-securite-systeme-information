<?php

if(isset($_POST['user']) && isset($_POST['mdp'])) {
  if($_POST['user'] !== '' && $_POST['mdp'] !== '') {
    $user = $_POST['user'];
    $mdp = $_POST['mdp'];

    echo "Identifiant : ".$user."<br>";
    echo "Mot de passe : ".$mdp;
  }
  else {
    echo "Erreur: L'identifiant et/ou le mot de passe sont vides.";
  }
}
else {
  echo "Erreur: L'identifiant et le mot de passe sont requis.";
}

?>
