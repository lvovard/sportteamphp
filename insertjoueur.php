<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 

 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 

  $nom = $_GET['nom'];
  $prenom   = $_GET['prenom'];
  $role  = $_GET['role']; 
  $id_cat = $_GET['id_cat']; 
  $id_club = $_GET['id_club'];
  //$query = 'INSERT INTO joueur (id,nom,prenom,id_club) VALUES ("","'.$nom.'","'.$prenom.'","'.$idclub.'")';
  $query = 'INSERT INTO joueur (nom,prenom,role,id_cat,id_club) VALUES ("'.$nom.'","'.$prenom.'","'.$role.'","'.$id_cat.'","'.$id_club.'")';
  echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysql_error());
  if ($result == 1)
  {
	  echo 'insert passed';
  }
  else
  {
	  echo 'insert failed';
  }
?>

