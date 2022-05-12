<meta charset="UTF-8"/>

<head>

<?php

	include'C:\wamp64\www\sitestage\header.html';
	
	
	try
		{

			$db = new PDO('mysql:host=localhost;dbname=labase', 'root' ,'');
			$db->exec(" SET CHARACTER SET utf8 ");
			$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e){
				
			echo'une erreur est survenue';
			die();
				
		}
?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
</head>

<style>

.banane{
	box-shadow: 1px 1px 12px #555;
	border-radius: 10px;
    position: sticky;
	background-color: #c1da77;
}


.couleur{
	
	color: black;
	text-decoration:underline #d3e59f;
	
}


.couleur:hover{
	
	color: black;

	text-decoration:underline #d3e59f;
	
}


.bordering{
	border-left: 2px solid #9aae5f;	
	border-right 2px solid #9aae5f;

	
}


.bordering:hover{
	background-color: #d3e59f;
}

</style>


<body>



<div id="accordion">
<div class="col-md">
</div>
<div class="row justify-content-md-center banane">



	
	<?php
	
		$select = $db->prepare("Select * From action"); // on récupère les actions de la bdd
		$select->execute();
		
		$count= $db->prepare("Select count(*) as compte From action"); // on récupère le nombre d'actions
		
		$count->execute();
		
		
		$data = $count->fetch(PDO::FETCH_OBJ);
		
		$compte=$data->compte;
		

		
	for ($i = 1; $i < $compte+1; $i++) {
		
		if(($s=$select->fetch(PDO::FETCH_OBJ))){ // tant qu'il y a des actions
		
						?>
						<div class="card-header block bordering" id="heading<?php echo $i;?>">
						<h5 class="mb-0">
					<button class="btn btn-link couleur" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
						<?php echo $s->nom;?>
					</button>
						</h5>
					</div>	
						<?php
						
						

 
	}else{
			break;
	}
}
		
	
	
	
	?>

</div>
</br>
</br>
<div class="col-md">
</div>
<div class="row justify-content-md-center">
<?php


		$select = $db->prepare("Select * From action"); // on récupère les actions de la bdd
		$select->execute();
	
		for ($i=1; $i < $compte+1; $i++) {
			
		if(($s=$select->fetch(PDO::FETCH_OBJ))){ // tant qu'il y a des actions
					
				
		if($i==1){	
		?>
		<div id="collapse<?php echo $i;?>" class="collapse show" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
		<div class="card-header">
		<?php echo $s->contenu;?>
        </div>
			</div>
			
	<?php
		}else{
			?>
		<div id="collapse<?php echo $i;?>" class="collapse" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordion">
		<div class="card-body">
		<?php echo $s->contenu;?>
        </div>
			</div>
			<?php
		}			

  

	}else{
			break;
	}
}
		
	
	
	
	?>

		

		
	
	</div>
		
</div>

 
</body>