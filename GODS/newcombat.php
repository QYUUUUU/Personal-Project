<?php

session_start();

$host_name = 'db5005324131.hosting-data.io';
$database = 'dbs4460089';
$user_name = 'dbu1092293';
$password = 'TnU2z%Yrjj/pcQz';
$db = null;

  try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }


  if(isset($_POST['submit'])){
  
      $nomcombat = $_POST['nomcombat'];

  
      $insert = $db->prepare("INSERT INTO `Combat` (`Id_Combat`, `nomcombat`) VALUES (NULL, '$nomcombat')"); // on insère dans la bdd
      $insert-> execute();
  
      header('Location: tools.php');
  
  }
  ?>

<form action"" method="POST">
<h2>Ajouter une arme :</h2>
<h4>Nom</h4><input type="text" name="nomcombat"/>
<input type="submit" name="submit"/><br/><br/>
</form>
