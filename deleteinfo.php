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
 

  $id_info = $_GET['id_info'];
  $query = 'DELETE FROM infoclub WHERE id_info = '.$id_info;
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

