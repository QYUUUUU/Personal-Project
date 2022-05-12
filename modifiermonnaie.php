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

    $type = $_POST['type'];
    $quantite = $_POST['quantite'];
    $pseudoS=$_REQUEST['id'];

    $insert = $db->prepare("INSERT INTO `monnaie` (`Id_Monnaie`, `type_monnaie`, `quantite`, `Id_Personnage`) VALUES (NULL, '$type', '$quantite', '$pseudoS')"); // on insère dans la bdd
    $insert-> execute();

    header('Location: Equipement.php');

}
?>
    

<form action"" method="POST">
<h2> :</h2>

<h4>Type</h4><input type="text" name="type"/>
<h4>Quantité</h4><input type="number" name="quantite"/>



<input type="submit" name="submit"/><br/><br/>
</form>
