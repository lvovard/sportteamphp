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
 

  $id_convoc = $_GET['id_convoc'];
  //$query = 'INSERT INTO joueur (id,nom,prenom,id_club) VALUES ("","'.$nom.'","'.$prenom.'","'.$idclub.'")';
  $query = 'DELETE FROM convocation WHERE id_convoc = '.$id_convoc;
  echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysqli_error($db->con));
  if ($result == 1)
  {
	  echo 'delete passed';
  }
  else
  {
	  echo 'delete failed';
  }
?>

