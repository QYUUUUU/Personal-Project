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

    $Id_Blessures=$_GET['idR'];
    $note=$_GET['note'];
    $type=$_GET['type'];


switch($type){

    case "legere":
        $insert = $db->prepare("UPDATE blessures SET legere='$note'where Id_Blessures='$Id_Blessures'"); // on insère dans la bdd
        $insert-> execute();
        break;
    
    case "grave":
        $insert = $db->prepare("UPDATE blessures SET grave='$note'where Id_Blessures='$Id_Blessures'"); // on insère dans la bdd
        $insert-> execute();
        break;

    case "mortelle":
        $insert = $db->prepare("UPDATE blessures SET mortelle='$note'where Id_Blessures='$Id_Blessures'"); // on insère dans la bdd
        $insert-> execute();
        break;

    }
    if($_GET['head']==1){
      header('Location: tools.php');
    }else{       
      header('Location: personnage.php');
    }
?>