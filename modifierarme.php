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
  
      $nomarme = $_POST['nomarme'];
      $dmgmodifier = $_POST['dégats'];
      $portee = $_POST['portee'];
      $rarete = $_POST['rarete'];
      $trait = $_POST['trait'];
      $descriptionarme = $_POST['descriptionarme'];
      $pseudoS=$_REQUEST['id'];
  
      $insert = $db->prepare("INSERT INTO `arme` (`Id_Arme`, `nomarme`, `dmgmodifier`, `portee`, `rarete`, `trait`, `descriptionarme`, `Id_Personnage`) VALUES (NULL, '$nomarme', '$dmgmodifier', '$portee', '$rarete', '$trait', '$descriptionarme', '$pseudoS')"); // on insère dans la bdd
      $insert-> execute();
  
      header('Location: Equipement.php');
  
  }
  ?>

<form action"" method="POST">
<h2>Ajouter une arme :</h2>

<h4>Nom</h4><input type="text" name="nomarme"/>
<h4>Dégats</h4><input type="number" name="dégats"/>
<h4>Portée</h4><input type="text" name="portee"/>
<h4>Rareté</h4><input type="text" name="rarete"/>
<h4>Trait</h4><input type="text" name="trait"/>
<h4>Description</h4><input type="text" name="descriptionarme"/>


<input type="submit" name="submit"/><br/><br/>
</form>
