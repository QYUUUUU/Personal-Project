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
?>

<meta charset="UTF-8"/>

<head>
<link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php

	include 'header.html';
?>


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<style>


.modifying{

    font-size: 15px;

}
a {
    text-align:center;
    color: white;
}

body{
    font-family: 'Source Sans Pro', sans-serif;
    background-image: url("godsbck.jpg");
    text-align:center;
    color: white;
}

.colorred{
    background-color: #526760;
    border: 5px double white;
    border-radius: 12px 12px 0px 0px;
}

.colorred1{
    background-color: white;
}

.whitening{
    background-color: white;    
}

.thing {
  padding: 1rem;
  width: 420px;
  box-shadow: 0 15px 30px 0 rgba(0,0,0,0.11),
    0 5px 15px 0 rgba(0,0,0,0.08);
    background-color: #d9e6ff;
  border-radius: 0.5rem;
  
  border-left: 0 solid #00ff99;
  transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;
}

.thing:nth-child(2n+1){

    background-color: #ffffff;

}

.thing:hover {
  padding-left: 0.5rem;
  border-left: 0.5rem solid #00ff99;
}

.thing > :first-child {
  margin-top: 0;
}

.thing > :last-child {
  margin-bottom: 0;
}

</style>

<body>

<div class="row">
<div class="w-25 p-3"></div>

<div class="w-50 p-3 colorred">

<?php

$pseudoS=$_SESSION['username'];



$select = $db->prepare("SELECT * from personnage where pseudo='$pseudoS'"); 
$select-> execute();
			
$data = $select->fetch(PDO::FETCH_OBJ);

    $Id_Personnage=$data->Id_Personnage;
    $nom_Personnage=$data->nom;
    $Id_ReserveD=$data->Id_ReserveD;
    $Id_Groupe=$data->Id_Groupe;
    $Id_Blessures=$data->Id_Blessures;
?>

<h3>
    <?php
echo $nom_Personnage;
?>

</h3>
<h3>
</br>
Caractéristiques
</h3>





<div class="row">
<?php

$select1 = $db->prepare("SELECT * from groupecaracteristique"); 
$select1-> execute();




			


while(($s=$select1->fetch(PDO::FETCH_OBJ))){ // tant qu'il y a des actions
		
 
    $Id_Groupecaracteristique=$s->Id_Groupecaracteristique;
 
    
    $select2 = $db->prepare("SELECT * from caracteristique where Id_Personnage='$Id_Personnage' and Id_Groupecaracteristique='$Id_Groupecaracteristique'"); 
    $select2-> execute();
?>

    <div class="w-25 p-3">

    <h3> <?php echo $s->nomgroupecaracteristique ?> </h3>

<?php
    while(($data=$select2->fetch(PDO::FETCH_OBJ))){
?>

<h4> <?php echo $data->nom_caracteristique," : ", $data->Dcaracteristique ?> </h4>


<?php
    }
?>
    </div>
    <?php
}

?>
</div>
</div>
<div class="w-25 p-5 colorred">


<?php

$select99 = $db->prepare("SELECT * from equilibre WHERE Id_Personnage='$Id_Personnage'"); 
$select99-> execute();

$salé=$select99->fetch(PDO::FETCH_OBJ)

?>

<h2>Equilibre</h2>

<h3> <?php echo "Humanite ".$salé->jaugehumanite."/".$salé->maxhumanite ?> <a href="modifierequilibre.php?ID=<?php echo $salé->Id_Equilibre;?>" class="modifying">Modifier</a></h3>
<h3> <?php echo "Divinité ".$salé->jaugedivinite."/".$salé->maxdivinite ?><a href="modifierequilibre.php?ID=<?php echo $salé->Id_Equilibre;?>" class="modifying">Modifier</a> </h3>




</div>
</div>



<div class="row">
<div class="w-25 p-5 colorred"> <?php // Afficher le jet de dé 




if(isset($_POST['throwing'])){

    $typethrow = $_POST['typethrow'];
    $competencethrown = $_POST['competencethrown'];
    $caracteristiquethrown = $_POST['caracteristiquethrown'];
    $modifier = $_POST['modifier'];

    $resultat='';
    if($typethrow=='lancer'){

        switch($competencethrown){

            case 2:
                $competencethrown=1;
                echo "Vous avez 1 relance";
                break;
            
            case 3:
                $competencethrown=2;
                echo "Vous avez 1 relance";
                break;


            case 4:
                $competencethrown=2;
                echo "Vous avez 2 relance";
                break;

            case 5:
                $competencethrown=3;
                echo "Vous avez 2 relance";
                break;

            case 6:
                $competencethrown=3;
                echo "Vous avez 3 relance";
                break;
        }
    
        
        
        $nombre=$caracteristiquethrown+$competencethrown+$modifier;

    }else{
        $nombre=$modifier;
    }
    if($nombre>0){
        
        for ($i=0; $i<$nombre;$i++){

            $undé=rand(1,10);
            $resultat=$resultat." ".$undé;


        }
}else{
    $resultat="Pas de dé";
}


    $today = getdate();
    $date= $today['year']."-".$today['mon']."-".$today['mday'];

    $insert = $db->prepare("INSERT INTO `throwing` (`Id_Throwing`, `datethrown`, `resultat`, `typethrow`, `Id_Personnage`) VALUES (NULL, '$date', '$resultat', '$typethrow', '$Id_Personnage')"); // on insère dans la bdd
    $insert-> execute();

}



$select3 = $db->prepare("SELECT * from caracteristique where Id_Personnage='$Id_Personnage'"); 
$select3-> execute();

$select4 = $db->prepare("SELECT * from competence where Id_Personnage='$Id_Personnage'"); 
$select4-> execute();


?>

<form action"" method="POST">
<h2>Lancer des dés</h2>

<h4>Type de lancé</h4><select type='text' name="typethrow">

        <option value="lancer">Lancer</option>
        <option value="relancer">Autre</option>

</select>

<h4>Caracteristique</h4><select type='number' name="caracteristiquethrown">

<?php
while(($data3=$select3->fetch(PDO::FETCH_OBJ))){
?>
        <option value="<?php echo $data3->Dcaracteristique ?>"><?php echo $data3->nom_caracteristique ?></option>
<?php
}
?>
</select>
<h4>Competence</h4><select type='number' name="competencethrown"">

<?php
while(($data4=$select4->fetch(PDO::FETCH_OBJ))){
?>
        <option value="<?php echo $data4->Dcompetence ?>"><?php echo $data4->nomcompetence ?></option>
<?php
}
?>
			</select>

<h4>Modifier</h4><input type="number" name="modifier"/>
<input type="submit" name="throwing"/><br/><br/>
</form>










<?php // afficher la réserve
$select5 = $db->prepare("SELECT * from reserved where Id_ReserveD='$Id_ReserveD'"); 


$select5-> execute();
			
$data5 = $select5->fetch(PDO::FETCH_OBJ);
?>
</br>
</br>
<h3> <?php echo "Effort ".$data5->effort."/".$data5->maxeffort ?> <a href="modifiersangfroid.php?ID=<?php echo $Id_ReserveD;?>" class="modifying">Modifier</a></h3>
<h3> <?php echo "Sang-Froid ".$data5->sangfroid."/".$data5->maxsangfroid ?><a href="modifiersangfroid.php?ID=<?php echo $Id_ReserveD;?>" class="modifying">Modifier</a> </h3>



<?php // afficher les blessures
$select11 = $db->prepare("SELECT * from blessures where Id_Blessures='$Id_Blessures'"); 


$select11-> execute();
			
$data11 = $select11->fetch(PDO::FETCH_OBJ);


?>
</br>
</br>

<h2>Blessures</h2>
</br>
</br>


<h3>Légères</h3>
<span id="note">
<a class="aimer" href="modifierblessures.php?note=<?=0?>&type=legere&idR=<?= $Id_Blessures ?>&head=2">
Reset
</a>
    <?php for ($i = 1; $i <= $data11->maxlegere; $i++) { ?>
        <a class="aimer" href="modifierblessures.php?note=<?=$i?>&type=legere&idR=<?= $Id_Blessures ?>&head=2">
            <?php if ($i <= $data11->legere) { ?>
                <img class="note" src="like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
    <a><?php echo $data11->nivlegere ?></a>
</span>


<h3>Graves</h3>
<span id="note">
<a class="aimer" href="modifierblessures.php?note=<?=0?>&type=grave&idR=<?= $Id_Blessures ?>&head=2">
Reset
</a>
    <?php for ($i = 1; $i <= $data11->maxgrave; $i++) { ?>
        <a class="aimer" href="modifierblessures.php?note=<?=$i?>&type=grave&idR=<?= $Id_Blessures ?>&head=2">
            <?php if ($i <= $data11->grave) { ?>
                <img class="note" src="like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
    <a><?php echo $data11->nivgrave ?></a>
</span>


<h3>Mortelle</h3>
<span id="note">
<a class="aimer" href="modifierblessures.php?note=<?=0?>&type=mortelle&idR=<?= $Id_Blessures ?>&head=2">
Reset
</a>
    <?php for ($i = 1; $i <= $data11->maxmortelle; $i++) { ?>
        <a class="aimer" href="modifierblessures.php?note=<?=$i?>&type=mortelle&idR=<?= $Id_Blessures ?>&head=2">
            <?php if ($i <= $data11->mortelle) { ?>
                <img class="note" src="like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
    <a><?php echo $data11->nivmortelle?></a>
</span>





</div>
<div class="w-50 p-2 colorred"> <?php // Affichage des competences ?>
<h3>


Competences
</br>
</br>
</h3>
<div class="row">


<?php

$select = $db->prepare("SELECT * from groupecompetence"); 
$select-> execute();



while(($s=$select->fetch(PDO::FETCH_OBJ))){ // tant qu'il y a des groupes de competences
		
 
    $Id_Groupecompetence=$s->Id_Groupecompetence;
 
    
    $select2 = $db->prepare("SELECT * from competence where Id_Personnage='$Id_Personnage' and Id_Groupecompetence='$Id_Groupecompetence'"); 
    $select2-> execute();
?>

    <div class="w-50 p-2">

    <h3> <?php echo $s->nomgroupecompetence ?> </h3>

<?php
    while(($data=$select2->fetch(PDO::FETCH_OBJ))){
?>

<h4> <?php echo $data->nomcompetence," : ", $data->Dcompetence ?> </h4>


<?php
    }
?>


    </div>



    


    <?php

}

?>
</div>
</div>

<div class="w-25 p-2">

    <section id="messages"></section>


    <script>
        setInterval('load_messages()',1000);
        function load_messages(){
            $('#messages').load('loadMessage.php');
        }
    </script>

</div>
</div>

</div>

</div>









</body>