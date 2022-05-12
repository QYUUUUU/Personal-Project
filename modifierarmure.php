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
  
      $nomarmure = $_POST['nomarmure'];
      $type=$_POST['typearmure'];
      $indiceCPT= $_POST['indiceCPT'];
      $mobilite = $_POST['mobilite'];
      $trait = $_POST['trait'];
      $rarete = $_POST['rarete'];
      $descriptionarmure = $_POST['descriptionarmure'];
      $pseudoS=$_REQUEST['id'];
  
      $insert = $db->prepare("INSERT INTO `armure` (`Id_Armure`, `nomarmure`, `typearmure`, `indiceCPT`, `mobilite`, `trait`, `rarete`, `descriptionarmure`, `Id_Personnage`) VALUES (NULL, '$nomarmure', '$type', '$indiceCPT', '$mobilite', '$trait', '$rarete', '$descriptionarmure', '$pseudoS')"); // on insère dans la bdd
      $insert-> execute();
  
      header('Location: Equipement.php');
  
  }
  ?>

    

<form action"" method="POST">
<h2>Ajouter une armure :</h2>

<h4>Nom</h4><input type="text" name="nomarmure"/>
<h4>Type</h4><input type="text" name="typearmure"/>
<h4>Indice C/P/T</h4><input type="text" name="indiceCPT"/>
<h4>Mobilité</h4><input type="text" name="mobilite"/>
<h4>Trait</h4><input type="text" name="trait"/>
<h4>Rarete</h4><input type="text" name="rarete"/>
<h4>descriptionarmure</h4><input type="text" name="descriptionarmure"/>


<input type="submit" name="submit"/><br/><br/>
</form>
