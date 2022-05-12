
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
    


    $selecting = $db->prepare("SELECT *
    FROM	(SELECT Id_Throwyesyes, resultat, nomennemi, typethrow from Throwyesyes Inner join Ennemi on Throwyesyes.Id_Ennemi=Ennemi.Id_Ennemi  where datethrown='$dateauj'
             ORDER BY Id_Throwyesyes DESC
             LIMIT 5)t1
             ORDER BY Id_Throwyesyes"); 
    $selecting-> execute();
    

    while(($datta=$selecting->fetch(PDO::FETCH_OBJ))){
  

       
        ?>
        <div class="thing">
            <h4><?= $datta->nomennemi?></h4>
            <h4><?= $datta->typethrow?></h4>
            <h4><?= $datta->resultat?></h4>
</div>
      <?php    
       
    }


?>