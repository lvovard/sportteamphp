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
 

  $id_cat = $_GET['id_cat'];
  $nb_equipe   = $_GET['nb_equipe']; 
  //$query = 'INSERT INTO club (sport,dep,club,email,password,id_club) VALUES ("'.$sport.'","'.$dep.'","'.$club.'","'.$email.'","'.$pwd.'","null")';
  $query = 'UPDATE categorie SET nb_equipe = "'.$nb_equipe.'" WHERE id_cat = "'.$id_cat.'"';
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