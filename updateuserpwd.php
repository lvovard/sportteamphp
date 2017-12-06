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
  $password   = $_GET['password']; 
  $query = 'UPDATE club SET password = "'.$password.'" WHERE id_club = "'.$id_club.'"';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysql_error());
  if ($result == 1)
  {
	  echo 'update passed';
  }
  else
  {
	  echo 'update failed';
  }
?>