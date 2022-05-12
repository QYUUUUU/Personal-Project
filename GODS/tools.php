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
table{
    margin:auto;
}
table,
td {
    border: 1px solid #333;
    text-align :center;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}

body{



}
a {
    text-align:center;
    color: white;
}

body{
    font-family: 'Source Sans Pro', sans-serif;
    background-image: url("godsbck1.png");
    text-align:center;
    color: white;
}


.thing:nth-child(2n+1){

background-color: #ffffff;

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
  background-color: #ffffff;
  border-radius: 0.5rem;
  
}


</style>

<body>

<?php

$pseudoS=$_SESSION['username'];

if($pseudoS=='Mj'){
?>

<div class="row">


<div class="w-25 p-3">
  
<section id="messages"></section>


<script>
	setInterval('load_messages()',1000);
	function load_messages(){
		$('#messages').load('loadMessage.php');
	}
</script>

</div>

<div class="w-50 p-3 colorred">






<div id="accordion">
<div class="col-md">
</div>
<div class="row justify-content-md-center ">



	
	<?php
	
		$select = $db->prepare("SELECT * From Combat"); // on récupère les actions de la bdd
		$select->execute();
		
		$count= $db->prepare("SELECT count(*) as compte From Combat"); // on récupère le nombre d'actions
		
		$count->execute();
		
		
		$data = $count->fetch(PDO::FETCH_OBJ);
		
		$compte=$data->compte;
		

		
	for ($i = 1; $i < $compte+1; $i++) {
		
		if(($s=$select->fetch(PDO::FETCH_OBJ))){ // tant qu'il y a des actions
		
						?>
						<div class="card-header " id="heading<?php echo $i;?>">
						<h5 class="mb-0">
					<button class="btn " data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
						<?php echo $s->nomcombat;?>
					</button>
						</h5>
					</div>	
						<?php
						
						

 
	}else{
			break;
	}
}
		
	
	
	
	?>
  <div class="card-header">
  <div class="btn">
      <a href="newcombat.php">Ajouter</a>
</div>
</div>
</div>
</br>
</br>
<div class="col-md">
</div>
<div class="row justify-content-md-center">
<?php


		$select = $db->prepare("SELECT * From Combat"); // on récupère les actions de la bdd
		$select->execute();
	
		for ($i=1; $i < $compte+1; $i++) {
			
		if(($s=$select->fetch(PDO::FETCH_OBJ))){ // tant qu'il y a des actions
				

			$select2 = $db->prepare("SELECT * From Ennemi where Id_Combat='$s->Id_Combat'"); // on récupère les actions de la bdd
			$select2->execute();

			$countz= $db->prepare("SELECT count(*) as compte From Ennemi where Id_Combat='$s->Id_Combat'"); // on récupère le nombre d'actions
		
			$countz->execute();
			
			
			$dataf = $countz->fetch(PDO::FETCH_OBJ);
			
			$comptez=$dataf->compte;	

				
		if($i==1){	
		?>
		<div id="collapse<?php echo $i;?>" class="collapse show" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
		<div class="card-header w-100">

	

		<div class="row">
<?php
		for ($z=1; $z < $comptez+1; $z++) {
			if(($sah=$select2->fetch(PDO::FETCH_OBJ))){
?>

				<div class="colorred ">
					<h2><?php echo $sah->nomennemi?></h2>
					
				
					<a href="jeterdennemi.php?typed=Attaque&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->attaque?>">Attaque</a>
					<a href="jeterdennemi.php?typed=Action&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->action?>">Action</a>
					<a href="jeterdennemi.php?typed=Relances&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->relances?>">Relances</a>
					<a href="jeterdennemi.php?typed=Réaction&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->reaction?>">Réaction</a>
					<a href="jeterdennemi.php?typed=Contact&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->contact?>">Contact</a>
					<a href="jeterdennemi.php?typed=Specialité&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->dspecialite?>">Spécialité</a>
					<a href="jeterdennemi.php?typed=Réserve&ide=<?=$sah->Id_Ennemi?>&nbr=<?=$sah->reserve?>">Réserve</a>


				<h4>Arme: <?=$sah->arme ?></h4>
				<h4>Armure: <?=$sah->armure ?></h4>
				<h4>Spécialité: <?=$sah->specialite ?></h4>
					<!--Les Blessures -->

<?php
$Id_Blessures=$sah->Id_Blessures;
$select11 = $db->prepare("SELECT * from blessures where Id_Blessures='$Id_Blessures'"); 
$select11-> execute();
$data11 = $select11->fetch(PDO::FETCH_OBJ);

?>
</br>



<h5>Légères</h5>
<span id="note">
<a class="aimer" href="modifierblessures.php?note=<?=0?>&type=legere&head=1&idR=<?= $Id_Blessures ?>">
Reset
</a>
    <?php for ($f = 1; $f <= $data11->maxlegere; $f++) { ?>
        <a class="aimer" href="modifierblessures.php?note=<?=$f?>&type=legere&head=1&idR=<?= $Id_Blessures ?>">
            <?php if ($f <= $data11->legere) { ?>
                <img class="note" src="like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
	<a><?php echo $data11->nivlegere ?></a>
</span>


<h5>Graves</h5>
<span id="note">
<a class="aimer" href="modifierblessures.php?note=<?=0?>&type=grave&head=1&idR=<?= $Id_Blessures ?>">
Reset
</a>
    <?php for ($f = 1; $f <= $data11->maxgrave; $f++) { ?>
        <a class="aimer" href="modifierblessures.php?note=<?=$f?>&type=grave&head=1&idR=<?= $Id_Blessures ?>">
            <?php if ($f <= $data11->grave) { ?>
                <img class="note" src="like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
	<a><?php echo $data11->nivgrave ?></a>
</span>


<h5>Mortelle</h5>
<span id="note">
<a class="aimer" href="modifierblessures.php?note=<?=0?>&type=mortelle&head=1&idR=<?= $Id_Blessures ?>">
Reset
</a>
    <?php for ($f = 1; $f <= $data11->maxmortelle; $f++) { ?>
        <a class="aimer" href="modifierblessures.php?note=<?=$f?>&type=mortelle&head=1&idR=<?= $Id_Blessures ?>">
            <?php if ($f <= $data11->mortelle) { ?>
                <img class="note" src="like.png" alt="">
            <?php } else {
                ?>
                <img class="note" src="neutre.png" alt="line neutre">
            <?php } ?>
        </a>
    <?php } ?>
	<a><?php echo $data11->nivmortelle ?></a>
</span>


<!-- Fin des Blessures-->



				</div>

<?php
			}
		}

	

?>
</div>  <!-- Fin du row -->
        </div>
			</div>
			
			
	<?php
		}else{

			?>





		<div id="collapse<?php echo $i;?>" class="collapse" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
		<div class="card-header w-100">

		<?php
		
		for ($n=1; $n < $comptez+1; $n++) {
			if(($sah=$select2->fetch(PDO::FETCH_OBJ))){
?>
				
				<p>azèyrsdyurdeuy</p>


<?php
			}
		}

	


?>
        </div>
			</div>
			<?php		

  

	}
}
}

	?>

		

		
	
	</div>
		
</div>







</div>

<div class="w-25 p-3">


<section id="throws"></section>


<script>
	setInterval('load_throws()',1000);
	function load_throws(){
		$('#throws').load('Throwsyesyes.php');
	}
</script>


</div>

</div>




























<?php }
else{

  ?>

Connecte toi en Admin: Mj / Zupar
<?php

}


?>
</body>