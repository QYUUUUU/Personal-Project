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
    color: #C5FFFD;
}

body{



}
a {
    text-align:center;
    color: white;
}

body{
    font-family: 'Source Sans Pro', sans-serif;
    background-image: url("godsbck2.jpg");
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
<div class="w-25 p-3 colorred">
<h2>Dieu</h2>
<h3>Interdits Divins : </h3>
<?php

$select = $db->prepare("SELECT nominterditdivin FROM dieu
Inner join interditdivin on dieu.Id_Dieu=interditdivin.Id_Dieu
Inner join eclat on dieu.Id_Dieu=eclat.Id_Dieu
where Id_Personnage='$Id_Personnage'"); 
$select-> execute();
?>
<h4>	
<?php
while($data = $select->fetch(PDO::FETCH_OBJ)){


    echo $data->nominterditdivin,", ";

}
?>
</h4>

<h3>Objectifs:</h3>


<?php

$select = $db->prepare("SELECT objectifmineur, objectifmajeur FROM dieu
Inner join eclat on dieu.Id_Dieu=eclat.Id_Dieu
where Id_Personnage='$Id_Personnage'"); 
$select-> execute();
$data = $select->fetch(PDO::FETCH_OBJ)

?>


<h4> <?php echo "Objectif mineur: ",$data->objectifmineur ?> </h4>

<h4> <?php echo "Objectif majeur: ",$data->objectifmajeur ?> </h4>
</div>

<div class="w-50 p-3 colorred">
<h2>Moi</h2>
<h3>Instinct</h3>


<?php
$select = $db->prepare("SELECT principes, interdits from instinct Inner join personnage on instinct.nom_Instinct=personnage.nom_Instinct where Id_Personnage='$Id_Personnage'"); 
$select-> execute();

$data = $select->fetch(PDO::FETCH_OBJ)
?>
<div class="row">
<div class="w-50 p-3">

    <h4> <?php echo "Principes: ",$data->principes ?> </h4>

</div>

<div class="w-50 p-3">

    <h4> <?php echo "Interdits :",$data->interdits ?> </h4>
    
</div>
</div>

</div>
<div class="w-25 p-3 colorred">

<h2>Le groupe</h2>
<h3>Instinct de groupe</h3>

    
<?php
$select = $db->prepare("SELECT principes, interdits from groupe Inner join personnage on groupe.Id_Groupe=personnage.Id_Groupe Inner join instinctgroupe on groupe.nom_instinctgroupe=instinctgroupe.nom_instinctgroupe

where personnage.Id_Personnage='$Id_Personnage'"); 
$select-> execute();

$data = $select->fetch(PDO::FETCH_OBJ)
?>

<h4> <?php echo "Principes: ",$data->principes ?> </h4>


<h4> <?php echo "Interdits :",$data->interdits ?> </h4>


</div>
</div>



</body>