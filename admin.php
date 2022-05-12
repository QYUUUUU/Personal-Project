<?php
ob_start();
?>
<meta charset="UTF-8">
<?php
session_start();
?>

<link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<h1> Bienvenue, <?php echo $_SESSION['username']; ?></h1>
<br/>
<a href="?action=add">Ajouter un praticien</a>
<a href="?action=modifyanddelete">Modifier/Supprimer un praticien</a><br/><br/>

<?php



	try
		{
			$db = new PDO('mysql:host=localhost;dbname=labase', 'root' ,'');
			$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $e){
				
			echo'une erreur est survenue';
			die();
				
		}




if(isset($_SESSION['username'])){//Est-on connecté ?
	if(isset($_GET['action'])){
		if($_GET['action']=='add'){
		
		
			if (isset ($_POST['submit'])){// Si le bouton est cliqué
				
				$idcontact=$_POST['idcontact'];
				$nomcontact=$_POST['nomcontact'];
				$prenomcontact=$_POST['prenomcontact'];
				$telephone=$_POST['telephone'];
				$affiliation=$_POST['affiliation'];
				$adresse=$_POST['adresse'];
				$nadresse=$_POST['nadresse'];
				$doctolib=$_POST['doctolib'];
				$profession=$_POST['profession'];
				$ndoctolib=$_POST['ndoctolib'];
				$nremplacant=$_POST['nremplacant'];
				$nomremplacant=$_POST['nomremplacant'];
				$infos=$_POST['infos'];
	
				$idedt=$_POST['idedt'];
				$lundim=$_POST['lundim'];
				$lundis=$_POST['lundis'];
				$mardim=$_POST['mardim'];
				$mardis=$_POST['mardis'];
				$mercredim=$_POST['mercredim'];
				$mercredis=$_POST['mercredis'];
				$jeudim=$_POST['jeudim'];
				$jeudis=$_POST['jeudis'];
				$vendredim=$_POST['vendredim'];
				$vendredis=$_POST['vendredis'];
				$samedim=$_POST['samedim'];
				$samedis=$_POST['samedis'];
				$dimanchem=$_POST['dimanchem'];
				$dimanches=$_POST['dimanches'];
				
	
				
	
	
				if($nomcontact&&$prenomcontact&&$telephone&&$affiliation&&$profession){// si tout est bien rempli
			
			
					
			
					$insert = $db->prepare("INSERT INTO contact VALUES('$idcontact','$nomcontact','$prenomcontact','$telephone','$affiliation','$adresse','$nadresse','$doctolib','$profession','$ndoctolib','$nremplacant','$nomremplacant','$infos','$idedt')"); // on insère dans la bdd
					$insert-> execute();
					
					$insert = $db->prepare("INSERT INTO edt VALUES('$idedt','$lundim','$lundis','$mardim','$mardis','$mercredim','$mercredis','$jeudim','$jeudis','$vendredim','$vendredis','$samedim','$samedis','$dimanchem','$dimanches')"); // on insère dans la bdd
					$insert-> execute();
					
			
				}else{	
						echo'Veuillez remplir tous les champs nécessaires';

					}
		
		
			}		
		
		
?>
		<form enctype="multipart/form-data" action="" method="post">
		<h1> Ajout</h1>
		<div class="row">
		<div class="container col-8 justify-content-center">
		
			<h3>Id:</h3><input type="text" name="idcontact"/>
			<div class="row">
			<div class="col-5">
			<h3>Nom:</h3><input type="text" name="nomcontact"/>
			</div>
			
			
			
			<div class="col-5">
			<h3>Prenom:</h3><input type="text" name="prenomcontact"/>
			</div>
			</div>
			</br></br>
			
			<div class="row">
			<div class="col-5">
			<h3>Telephone:</h3><input type="text" name="telephone"/>
			</div>
			
			</br></br>
			<div class="col-5">
			<h3>Affiliation</h3><select name="affiliation">
				<option>nord</option>
				<option>sud</option>
				<option>site satellite</option>
			</select>
			</div>
			</div>
			</br></br>
			<div class="row">
			<div class="col-5">
			<h3>Adresse</h3><input type="text" name="adresse"/>	
			</div>
			<div class="col-5">
			<h3>Nécessité adresse</h3><select name="nadresse">
				<option value="1">oui</option>
				<option value="0">non</option>
			</select>
			</div>
			</div>
			</br></br>
			<div class="row">
			<div class="col-5">
			<h3>Lien Doctolib</h3><input type="text" name="doctolib"/>
			</div>
			<div class="col-5">
			<fieldset>
				<h3>Nécessité lien</h3><select name="ndoctolib">
				<option value="1">oui</option>
				<option value="0">non</option>
			</select>
			</div>
			</div>
			</br></br>
			
			<div class="row">
			<div class="col-5">
			
			<h3>Profession</h3><select name="profession">
				<option VALUE="medecin">Medecin</option>
				<option value="Sage Femme">Sage Femme</option>
				<option value="Infirmier">Infirmier</option>
				<option value="Kinesitherapeute">Kinésithérapeute</option>
				<option value="Psychologue">Psychologue</option>
				<option value="Orthophoniste">Orthophoniste</option>
				<option value="Pedicure Podologue">Pedicure Podologue</option>
				<option value="Sexologue">Sexologue</option>
				<option value="Dieteticienne">Dieteticienne</option>
			</select>
			</div>
			
			<div class="col-5">
			<h3>Informations complémentaires:</h3><textarea name="infos"/></textarea>
			</div>
			</div>
			
			</br></br>
			
			
			

			<div class="row">
			<div class="col-5">
			<h3>Nom remplaçant</h3><input type="text" name="nomremplacant"/>
			</div>
		
			<div class="col-5">
			<h3>Nécessité remplacant</h3><select name="nremplacant">
				<option value="1">oui</option>
				<option value="0">non</option>
			</select>	
			</div>
			</div>
			
			
			
			
			
			
			</br>
			</br>
			<div class="center">
			<input type="submit" name="submit"/>
			</div>
			</div>
			
			
			
			
			
			<div class="col-4">
			<h3>Id emploi du temps:</h3><input type="text" name="idedt"/>
				<div class="row">
					<div class="col-5">	
						<h3>Lundi matin</h3><input type="text" name="lundim"/>
					</div>
					<div class="col-5">				
						<h3>Lundi soir</h3><input type="text" name="lundis"/>
					</div>
					</div>
				
				</br></br>
				
			
				<div class="row">
					<div class="col-5">	
						<h3>Mardi matin</h3><input type="text" name="mardim"/>
					</div>
					<div class="col-5">				
						<h3>Mardi soir</h3><input type="text" name="mardis"/>
					</div>
					</div>
				
			</br></br>
			
			
				<div class="row">
					<div class="col-5">	
						<h3>Mercredi matin</h3><input type="text" name="mercredim"/>
					</div>
					<div class="col-5">				
						<h3>Mercredi soir</h3><input type="text" name="mercredis"/>
					</div>
					</div>
			
			</br></br>
			
				<div class="row">
					<div class="col-5">	
						<h3>Jeudi matin</h3><input type="text" name="jeudim"/>
					</div>
					<div class="col-5">				
						<h3>Jeudi soir</h3><input type="text" name="jeudis"/>
					</div>
					</div>
				
			</br></br>
	
				<div class="row">
					<div class="col-5">	
						<h3>Vendredi matin</h3><input type="text" name="vendredim"/>
					</div>
					<div class="col-5">				
						<h3>Vendredi soir</h3><input type="text" name="vendredis"/>
					</div>
					</div>
			
			</br></br>
		
				<div class="row">
					<div class="col-5">	
						<h3>Samedi matin</h3><input type="text" name="samedim"/>
					</div>
					<div class="col-5">				
						<h3>Samedi soir</h3><input type="text" name="samedis"/>
					</div>
					</div>
	
			</br></br>

				<div class="row">
					<div class="col-5">	
						<h3>Dimanche matin</h3><input type="text" name="dimanchem"/>
					</div>
					<div class="col-5">				
						<h3>Dimanche soir</h3><input type="text" name="dimanches"/>
					</div>
					</div>

			
			
			</div>
	
	
	</div>
		</form>
<?php

		}else if($_GET['action']=='modifyanddelete'){// si l'option modifier et supprimer est cliqué

			$select = $db->prepare("Select * from contact Inner join edt on contact.idedt=edt.idedt"); // on affiche tous les praticiens à l'écran
			$select->execute();
			?>
			<div class="row"> 
			<?php
			while($s=$select->fetch(PDO::FETCH_OBJ)){ // tant qu'il y a des praticiens
				?>
				
				<div class="container">
				<?php
				echo $s->nomcontact; // on les affiche
?>
				<a href="?action=modify&amp;idcontact=<?php echo $s->idcontact;?>">Modifier</a> 
				<a href="?action=delete&amp;idcontact=<?php echo $s->idcontact;?>">Supprimer</a><br\><br\>
				</div>
				
				<?php
				
			}
			
			?>
			</div>
			<?php
			
		}else if($_GET['action']=='modify'){
		
				
				
				
				
			$id=$_GET['idcontact'];
			
			$select = $db->prepare("Select * from contact Inner join edt on contact.idedt=edt.idedt WHERE idcontact=$id"); 
			$select-> execute();
			
			$data = $select->fetch(PDO::FETCH_OBJ);
			?>



<form enctype="multipart/form-data" action="" method="post">
		<h1>Modification</h1>
		<div class="row">
		<div class="container col-8 justify-content-center">
		
			<h3>Id:</h3><input type="text" name="idcontact"  value="<?php echo $data->idcontact; ?>"/>
			<div class="row">
			<div class="col-5">
			<h3>Nom:</h3><input type="text" name="nomcontact"  value="<?php echo $data->nomcontact; ?>"/>
			</div>
			
			
			
			<div class="col-5">
			<h3>Prenom:</h3><input type="text" name="prenomcontact"  value="<?php echo $data->prenomcontact; ?>"/>
			</div>
			</div>
			</br></br>
			
			<div class="row">
			<div class="col-5">
			<h3>Telephone:</h3><input type="text" name="telephone"  value="<?php echo $data->telephone; ?>"/>
			</div>
			
			</br></br>
			<div class="col-5">
			<h3>Affiliation</h3><select name="affiliation"  value="<?php echo $data->affiliation; ?>">
			<?php
			
			if ($data->affiliation=="nord"){
				?>
				<option selected="yes">nord</option>
				<option>sud</option>
				<?php
			}else if($data->affiliation=="sud"){
?>
				<option>nord</option>
				<option  selected="yes">sud</option>
<?php	
			}else{
			?>
			<option>nord</option>
				<option>sud</option>
<?php				
			}
			?>
			</select>
			</div>
			</div>
			</br></br>
			<div class="row">
			<div class="col-5">
			<h3>Adresse</h3><input type="text" name="adresse"  value="<?php echo $data->adresse; ?>"/>	
			</div>
			<div class="col-5">
			<h3>Nécessité adresse</h3>
					<select name="nadresse">
					<?php
					
						if ($data->nadresse==1){
						?>
						<option value="1" selected="yes">oui</option>
						<option value="0">non</option>
						<?php
						}else{
							?>
							<option value="1" >oui</option>
							<option value="0" selected="yes">non</option>
							<?php
						}
						
						
						?>
						<label>Cocher si oui</label>
					</select>
			</div>
			</div>
			</br></br>
			<div class="row">
			<div class="col-5">
			<h3>Lien Doctolib</h3><input type="text" name="doctolib"   value="<?php echo $data->doctolib; ?>"/>
			</div>
			<div class="col-5">
			<h3>Nécessité lien</h3>
					<select name="ndoctolib">
					<?php
					
						if ($data->ndoctolib==1){
						?>
						<option value="1">oui</option>
						<option value="0">non</option>
						<?php
						}else{
							?>
							
							<option value="0">non</option>
							<option value="1">oui</option>
							<?php
						}
						
						
						?>
						<label>Cocher si oui</label>
					</select>
			</div>
			</div>
			</br></br>
			
			<div class="row">
			<div class="col-5">
			
			<h3>Profession</h3><select name="profession">
				<option VALUE="<?php echo $data->doctolib; ?>"><?php echo $data->profession; ?></option>
				<option VALUE="Medecin">Medecin</option>
				<option value="Sage Femme">Sage Femme</option>
				<option value="Infirmier">Infirmier</option>
				<option value="Kinesitherapeute">Kinésithérapeute</option>
				<option value="Psychologue">Psychologue</option>
				<option value="Orthophoniste">Orthophoniste</option>
				<option value="Pedicure Podologue">Pedicure Podologue</option>
				<option value="Sexologue">Sexologue</option>
				<option value="Dieteticienne">Dieteticienne</option>
			</select>
			</div>
			
			<div class="col-5">
			<h3>Informations complémentaires:</h3><textarea name="infos"/><?php echo $data->infos; ?></textarea>
			</div>
			</div>
			
			</br></br>
			
			
			

			<div class="row">
			<div class="col-5">
			<h3>Nom remplaçant</h3><input type="text" name="nomremplacant" value="<?php echo $data->nomremplacant; ?>"/>
			</div>
		
			<div class="col-5">
			<h3>Nécessité remplaçant</h3>
					<select name="nremplacant">
					<?php
					
						if ($data->nremplacant==1){
						?>
						<option value="1">oui</option>
						<option value="0">non</option>
						<?php
						}else{
							?>
							
							<option value="0">non</option>
							<option value="1">oui</option>
							<?php
						}
						
						
						?>
						<label>Cocher si oui</label>
					</select>	
			</div>
			</div>
			
			
			
			
			
			
			</br>
			</br>
			<div class="center">
			<input type="submit" name="submit"/>
			</div>
			</div>
			
			
			
			
			
			<div class="col-4">
			<h3>Id emploi du temps:</h3><input type="text" name="idedt" value="<?php echo $data->idedt; ?>"/>
				<div class="row">
					<div class="col-5">	
						<h3>Lundi matin</h3><input type="text" name="lundim" value="<?php echo $data->lundim; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Lundi soir</h3><input type="text" name="lundis" value="<?php echo $data->lundis; ?>"/>
					</div>
					</div>
				
				</br></br>
				
			
				<div class="row">
					<div class="col-5">	
						<h3>Mardi matin</h3><input type="text" name="mardim" value="<?php echo $data->mardim; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Mardi soir</h3><input type="text" name="mardis" value="<?php echo $data->mardis; ?>"/>
					</div>
					</div>
				
			</br></br>
			
			
				<div class="row">
					<div class="col-5">	
						<h3>Mercredi matin</h3><input type="text" name="mercredim" value="<?php echo $data->mercredim; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Mercredi soir</h3><input type="text" name="mercredis" value="<?php echo $data->mercredis; ?>"/>
					</div>
					</div>
			
			</br></br>
			
				<div class="row">
					<div class="col-5">	
						<h3>Jeudi matin</h3><input type="text" name="jeudim" value="<?php echo $data->jeudim; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Jeudi soir</h3><input type="text" name="jeudis" value="<?php echo $data->jeudis; ?>"/>
					</div>
					</div>
				
			</br></br>
	
				<div class="row">
					<div class="col-5">	
						<h3>Vendredi matin</h3><input type="text" name="vendredim" value="<?php echo $data->vendredim; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Vendredi soir</h3><input type="text" name="vendredis" value="<?php echo $data->vendredis; ?>"/>
					</div>
					</div>
			
			</br></br>
		
				<div class="row">
					<div class="col-5">	
						<h3>Samedi matin</h3><input type="text" name="samedim" value="<?php echo $data->samedim; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Samedi soir</h3><input type="text" name="samedis" value="<?php echo $data->samedis; ?>"/>
					</div>
					</div>
	
			</br></br>

				<div class="row">
					<div class="col-5">	
						<h3>Dimanche matin</h3><input type="text" name="dimanchem" value="<?php echo $data->dimanchem; ?>"/>
					</div>
					<div class="col-5">				
						<h3>Dimanche soir</h3><input type="text" name="dimanches" value="<?php echo $data->dimanches; ?>"/>
					</div>
					</div>

			
			
			</div>
	
	
	</div>
		</form>

			
			
		
			<?php
			
			if(isset($_POST['submit'])){
						
				$idcontact=$_POST['idcontact'];
				$nomcontact=$_POST['nomcontact'];
				$prenomcontact=$_POST['prenomcontact'];
				$telephone=$_POST['telephone'];
				$affiliation=$_POST['affiliation'];
				$adresse=$_POST['adresse'];
				$nadresse=$_POST['nadresse'];
				$doctolib=$_POST['doctolib'];
				$profession=$_POST['profession'];
				$ndoctolib=$_POST['ndoctolib'];
				$nremplacant=$_POST['nremplacant'];
				$nomremplacant=$_POST['nomremplacant'];
				$infos=$_POST['infos'];
	
				$idedt=$_POST['idedt'];
				$lundim=$_POST['lundim'];
				$lundis=$_POST['lundis'];
				$mardim=$_POST['mardim'];
				$mardis=$_POST['mardis'];
				$mercredim=$_POST['mercredim'];
				$mercredis=$_POST['mercredis'];
				$jeudim=$_POST['jeudim'];
				$jeudis=$_POST['jeudis'];
				$vendredim=$_POST['vendredim'];
				$vendredis=$_POST['vendredis'];
				$samedim=$_POST['samedim'];
				$samedis=$_POST['samedis'];
				$dimanchem=$_POST['dimanchem'];
				$dimanches=$_POST['dimanches'];
						
						$update= $db->prepare("UPDATE contact SET idcontact='$idcontact', nomcontact='$nomcontact', prenomcontact='$prenomcontact', telephone='$telephone', affiliation='$affiliation', adresse='$adresse', nadresse='$nadresse', doctolib='$doctolib', profession='$profession', ndoctolib='$ndoctolib', nremplacant='$nremplacant', nomremplacant='$nomremplacant', infos='$infos', idedt='$idedt' WHERE idcontact='$idcontact'");
						$update->execute();
						
						
						$update= $db->prepare("UPDATE edt SET idedt='$idedt',lundim='$lundim',lundis='$lundis',mardim='$mardim',mardis='$mardis',mercredim='$mercredim',mercredis='$mercredis',jeudim='$jeudim',jeudis='$jeudis',vendredim='$vendredim',vendredis='$vendredis',samedim='$samedim',samedis='$samedis',dimanchem='$dimanchem',dimanches='$dimanches' WHERE idedt='$idedt'");
						$update->execute();
						
			
						
						header('Location:admin.php?action=modifyanddelete');
						ob_enf_flush();
						
				}
			
			
			
			
			
	
		}else if($_GET['action']=='delete'){
			$id=$_GET['idcontact'];
			
			$delete = $db->prepare("Delete From contact Where idcontact=$id");
			$delete->execute();
			$delete = $db->prepare("Delete From edt Where idedt=$id");
			$delete->execute();
	
		}else{
			die('une erreur s\'est produite.');	
	
		}

	
	}else{
		
		
		
		
	}
}else{
	
	header('Location: connexion.php');	// on redirige vers l'index si rien ne vas
}
?>