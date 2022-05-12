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

    $Id_Equilibre=$_GET['ID'];
    $select = $db->prepare("SELECT * from equilibre where Id_Equilibre='$Id_Equilibre'"); 
    $select-> execute();

    $data = $select->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])){
    
        $humanite = $_POST['humanite'];
        $divinite = $_POST['divinite'];
        $maxhumanite=$data->maxhumanite;
        $maxdivinite=$data->maxdivinite;
        $Id_Personnage=$data->Id_Personnage;

    
        $updating= $db->prepare("UPDATE equilibre SET  Id_Equilibre='$Id_Equilibre', jaugehumanite='$humanite', jaugedivinite='$divinite', maxhumanite='$maxhumanite', maxdivinite='$maxdivinite', Id_Personnage='$Id_Personnage' WHERE Id_Equilibre='$Id_Equilibre'");
    
      $updating->execute();
    
        header('Location: personnage.php');
    
    }
    ?>

    

<form action"" method="POST">
<h2>Modifier l'Equilibre :</h2>

<h4>Humanite</h4><input type="number" name="humanite" value="<?php echo $data->jaugehumanite; ?>"/>
<h4>Divinite</h4><input type="number" name="divinite" value="<?php echo $data->jaugedivinite; ?>"/>

<input type="submit" name="submit"/><br/><br/>
</form>
