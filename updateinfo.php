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

  $id_equipe = $_GET['id_equipe'];
  $objet   = $_GET['objet']; 
  $message   = $_GET['message'];
  $state   = $_GET['state'];
  $id_club   = $_GET['id_club'];    
  $id_info   = $_GET['id_info'];
  $date_info   = $_GET['date_info'];
  $heure_info   = $_GET['heure_info'];  
  
  $query = 'UPDATE infoclub SET 
		id_equipe = "'.$id_equipe.'",
		objet = "'.$objet.'",
		message = "'.$message.'",
		state = "'.$state.'",
		id_club = "'.$id_club.'",
		date_record = NOW(),
		date_info = "'.$date_info.'",
		heure_info = "'.$heure_info.'"
    WHERE id_info = "'.$id_info.'"';
  echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysqli_error($db->con));
  if ($result == 1)
  {
	  echo 'update passed';
  }
  else
  {
	  echo 'update failed';
  }
?>