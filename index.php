<?php 
session_start();
$host_name = 'db5005324131.hosting-data.io';
$database = 'dbs4460089';
$user_name = 'dbu1092293';
$passwording = 'TnU2z%Yrjj/pcQz';
$db = null;



  try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $passwording);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }



  if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $select = $db->prepare("SELECT * FROM `profil` where Pseudo='$username'"); // on récupère les profils de la bdd
  $select->execute();
  $data = $select->fetch(PDO::FETCH_OBJ);
  $user=$data->pseudo;
  $password_definit=$data->password;
  if($username&&$password){
	  if($username==$user&&$password==$password_definit){
		  $_SESSION['username']=$username;
		  header("Location: personnage.php");
		  die();	
	  }else{
			  echo'Vos identifients sont éronnés';	
	  }
  }else{
	  echo'veuillez remplir tout les champs';
  }	
  }
  ?>
  <meta charset="UTF-8"/>
  <head>
  <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php
	  include 'header.html';
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
  <h1>Connexion</h1>
  <form action"" method="POST">
  <h3>Pseudo :</h3><input type="text" name="username"/><br/><br/>
  <h3>Mot de passe :</h3><input type="password" name="password"/><br/><br/>
  <input type="submit" name="submit"/><br/><br/>
  </form>
  </body>
