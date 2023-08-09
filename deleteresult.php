<?php
 

 
// array for JSON response
$response = array();
 

 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 

  $id_resultat = $_GET['id_resultat'];
  $query = 'DELETE FROM resultat WHERE id_resultat = '.$id_resultat;
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

