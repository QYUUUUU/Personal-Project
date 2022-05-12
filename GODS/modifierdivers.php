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

    $nomdivers = $_POST['nomdivers'];
    $prix = $_POST['prix'];
    $raretedivers = $_POST['raretedivers'];
    $descriptiondivers = $_POST['descriptiondivers'];
    $pseudoS=$_REQUEST['id'];

    $insert = $db->prepare("INSERT INTO `divers` (`Id_Divers`, `nomdivers`, `prix`, `raretedivers`, `desciptiondivers`, `Id_Personnage`) VALUES (NULL, '$nomdivers', '$prix', '$raretedivers', '$descriptiondivers', '$pseudoS')"); // on insère dans la bdd
    $insert-> execute();

    header('Location: Equipement.php');

}
?>

    

<form action"" method="POST">
<h2>Ajouter Divers :</h2>

<h4>Nom</h4><input type="text" name="nomdivers"/>
<h4>Prix</h4><input type="text" name="prix"/>
<h4>Rareté</h4><input type="text" name="raretedivers"/>
<h4>Description</h4><input type="text" name="descriptiondivers"/>


<input type="submit" name="submit"/><br/><br/>
</form>
