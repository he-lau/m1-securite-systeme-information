<?php

require_once("debug_console.php");

/*
  Connection à la bd
*/
function connect_db() {
  global $db;

$server = "localhost;port=3306;dbname=m1_securite_systeme";
$username = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$server", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  debug_to_console("Connection à la db réussi.");

} catch(PDOException $e) {
  debug_to_console("Connection failed:"  . $e->getMessage());
}
}



?>
