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
 

  $id_club = $_GET['id_club'];
  $nom   = $_GET['nom'];
  $nb_equipe  = $_GET['nb_equipe']; 
  //$result = mysqli_query($db->con,"INSERT INTO club (sport,dep,club,email,password,id_club) VALUES (".$sport.",".$dep.",".$club.",".$email.",".$pwd.")") or die(mysql_error()); 
  $query = 'INSERT INTO categorie (id_club,nom,date_record,nb_equipe) VALUES ("'.$id_club.'","'.$nom.'",NOW(),"'.$nb_equipe.'")';
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