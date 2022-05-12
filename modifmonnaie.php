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

    $Id_Monnaie=$_GET['id'];

        $select = $db->prepare("SELECT * from monnaie where Id_Monnaie='$Id_Monnaie'"); 
        $select-> execute();
        $s=$select->fetch(PDO::FETCH_OBJ);

if(isset($_POST['submit'])){

    $type = $_POST['type'];
    $quantite = $_POST['quantite'];


    $insert = $db->prepare("UPDATE monnaie SET quantite='$quantite', type_monnaie='$type' where Id_Monnaie='$Id_Monnaie'"); // on insère dans la bdd
    $insert-> execute();

    header('Location: Equipement.php');

}
?>

<form action"" method="POST">
<h2> Modifier la THUNE:</h2>

<h4>Type</h4><input type="text" name="type" value="<?php echo $s->type_monnaie ?>"/>
<h4>Quantité</h4><input type="number" name="quantite" value="<?php echo $s->quantite  ?>"/>



<input type="submit" name="submit"/><br/><br/>
</form>

