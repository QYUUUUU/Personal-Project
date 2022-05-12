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
a{
    text-align:center;
    color: white;
}

body{
    font-family: 'Source Sans Pro', sans-serif;
    background-image: url("complet gods 1.jpg");
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
  background-color: #ffffff;
  border-radius: 0.5rem;
  
  border-left: 0 solid #00ff99;
  transition: border-left 300ms ease-in-out, padding-left 300ms ease-in-out;
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



$select = $db->prepare("Select * from personnage where pseudo='$pseudoS'"); 
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
</div>
<div class="w-25 p-3"></div>
</div>

<div class="row">
<div class="w-25 p-3"></div>

<div class="w-50 p-3 colorred">


<h3>Equipement</h3>


<div class="p-3">
<h4>Armes</h4>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Dégats</th>
            <th>Portée</th>
            <th>Rareté</th>
            <th>Trait</th>
            <th>Description</th>
            <th>Padbétises</th>
     
        </tr>
    </thead>
    <tbody>
        






<?php
        $select = $db->prepare("Select * from arme where Id_Personnage='$Id_Personnage'"); 
        $select-> execute();

        while(($s=$select->fetch(PDO::FETCH_OBJ))){
?>
            <tr>
            <td><?php echo $s->nomarme; ?></td>
            <td><?php echo $s->dmgmodifier; ?></td>
            <td><?php echo $s->portee; ?></td>
            <td><?php echo $s->rarete; ?></td>
            <td><?php echo $s->trait; ?></td>
            <td><?php echo $s->descriptionarme; ?></td>
            <td><a href="supprimerarme.php?id=<?php echo $s->Id_Arme ?>" class="modifying">Supprimer</a></td>
        </tr>
<?php
        }


?>

</tbody>
</table>

<a href="modifierarme.php?id=<?php echo $Id_Personnage ?>" class="modifying">Ajouter</a>
</div>

<div class="p-3">
<h4>Armure</h4>


<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Indice C/P/T</th>
            <th>Mobilité</th>
            <th>Trait</th>
            <th>Rarete</th>
            <th>Description</th>
            <th>Padbétises</th>
     
        </tr>
    </thead>
    <tbody>
        






<?php
        $select = $db->prepare("Select * from armure where Id_Personnage='$Id_Personnage'"); 
        $select-> execute();

        while(($s=$select->fetch(PDO::FETCH_OBJ))){
?>
            <tr>
            <td><?php echo $s->nomarmure; ?></td>
            <td><?php echo $s->typearmure; ?></td>
            <td><?php echo $s->indiceCPT; ?></td>
            <td><?php echo $s->mobilite; ?></td>
            <td><?php echo $s->trait; ?></td>
            <td><?php echo $s->rarete; ?></td>
            <td><?php echo $s->descriptionarmure; ?></td>
            <td><a href="supprimerarmure.php?id=<?php echo $s->Id_Armure ?>" class="modifying">Supprimer</a></td>
        </tr>
<?php
        }


?>

</tbody>
</table>

<a href="modifierarmure.php?id=<?php echo $Id_Personnage ?>" class="modifying">Ajouter</a>
</div>

<div class="p-3">
<h4>Divers</h4>


<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>prix</th>
            <th>Rareté</th>
            <th>Description</th>
            <th>Padbétises</th>
     
        </tr>
    </thead>
    <tbody>
        






<?php
        $select = $db->prepare("Select * from divers where Id_Personnage='$Id_Personnage'"); 
        $select-> execute();

        while(($s=$select->fetch(PDO::FETCH_OBJ))){
?>
            <tr>
            <td><?php echo $s->nomdivers; ?></td>
            <td><?php echo $s->prix; ?></td>
            <td><?php echo $s->raretedivers; ?></td>
            <td><?php echo $s->desciptiondivers; ?></td>
            <td><a href="supprimerdivers.php?id=<?php echo $s->Id_Divers ?>" class="modifying">Supprimer</a></td>
        </tr>
<?php
        }


?>

</tbody>
</table>


<a href="modifierdivers.php?id=<?php echo $Id_Personnage ?>" class="modifying">Ajouter</a>
</div>

<div class="p-3">
<h4>Monnaie</h4>


<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Quantite</th>
            <th>Tention</th>
     
        </tr>
    </thead>
    <tbody>
        






<?php
        $select = $db->prepare("Select * from monnaie where Id_Personnage='$Id_Personnage'"); 
        $select-> execute();

        while(($s=$select->fetch(PDO::FETCH_OBJ))){
?>
            <tr>
            <td><?php echo $s->type_monnaie; ?></td>
            <td><?php echo $s->quantite; ?></td>
            <td><a href="supprimermonnaie.php?id=<?php echo $s->Id_Monnaie ?>" class="modifying">Supprimer /</a>
            <a href="modifmonnaie.php?id=<?php echo $s->Id_Monnaie ?>" class="modifying">Modifier</a>
            </td>
        </tr>
<?php
        }


?>

</tbody>
</table>

<a href="modifiermonnaie.php?id=<?php echo $Id_Personnage ?>" class="modifying">Ajouter</a>
</div>




</div>
<div class="w-25 p-3"></div>
</div>



</body>