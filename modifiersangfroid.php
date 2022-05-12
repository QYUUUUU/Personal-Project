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

    $Id_ReserveD=$_GET['ID'];
    $select = $db->prepare("SELECT * from reserved where Id_ReserveD='$Id_ReserveD'"); 
    $select-> execute();

    $data = $select->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])){
    
        $sangfroid = $_POST['sangfroid'];
        $effort = $_POST['effort'];
        $maxeffort=$data->maxeffort;
        $maxsangfroid=$data->maxsangfroid;
    
        $updating= $db->prepare("UPDATE reserved SET  Id_ReserveD='$Id_ReserveD', effort='$effort', sangfroid='$sangfroid', maxeffort='$maxeffort', maxsangfroid='$maxsangfroid' WHERE Id_ReserveD='$Id_ReserveD'");
    
      $updating->execute();
    
        header('Location: personnage.php');
    
    }
    ?>

    

<form action"" method="POST">
<h2>Modifier Réserve de dé :</h2>

<h4>Effort</h4><input type="number" name="effort" value="<?php echo $data->effort; ?>"/>
<h4>Sang-froid</h4><input type="number" name="sangfroid" value="<?php echo $data->sangfroid; ?>"/>

<input type="submit" name="submit"/><br/><br/>
</form>
