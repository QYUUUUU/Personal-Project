
<style>

    h4{
        color: black;
    }
    

</style>


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

  
        $today = getdate();
        $dateauj= $today['year']."-".$today['mon']."-".$today['mday'];
        


        $select = $db->prepare("SELECT *
        FROM	(SELECT Id_Throwing, resultat,nom, typethrow from throwing Inner join personnage on throwing.Id_Personnage=personnage.Id_Personnage  where datethrown='$dateauj'
                 ORDER BY Id_Throwing DESC
                 LIMIT 5)t1
                 ORDER BY Id_Throwing"); 
        $select-> execute();
        

        while(($data=$select->fetch(PDO::FETCH_OBJ))){


           
            ?>
            <div class="thing">
                <h4><?= $data->nom?></h4>
                <h4><?= $data->typethrow?></h4>
                <h4><?= $data->resultat?></h4>
</div>
          <?php    
          $resultat='';  
        }


?>