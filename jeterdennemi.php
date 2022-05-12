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



$typed = $_REQUEST['typed'];
$nbr = $_REQUEST['nbr'];
$ide = $_REQUEST['ide'];
    
    
    if($nbr>0){
        
        for ($i=0; $i<$nbr;$i++){

            $undé=rand(1,10);
            $resultat=$resultat." ".$undé;


        }
}else{
    $resultat="Pas de dé";
}



    $today = getdate();
    $date= $today['year']."-".$today['mon']."-".$today['mday'];

    $insert = $db->prepare("INSERT INTO `Throwyesyes` (`Id_Throwyesyes`, `datethrown`, `resultat`, `typethrow`, `Id_Ennemi`) VALUES (NULL, '$date', '$resultat', '$typed', '$ide')"); // on insère dans la bdd
    $insert-> execute();

    header('Location: tools.php');

?>