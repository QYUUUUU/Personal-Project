
<?php


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

    $Id_Armure=$_GET['id'];
    $select = $db->prepare("DELETE from armure where Id_Armure='$Id_Armure'"); 
    $select-> execute();

    $data = $select->fetch(PDO::FETCH_OBJ);

    header('Location: Equipement.php');


?>