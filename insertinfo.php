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
  $objet = $_GET['objet'];
  $message = $_GET['message'];
  $state = $_GET['state'];
  $id_club = $_GET['id_club'];  
  $date_info = $_GET['date_info'];
  $heure_info = $_GET['heure_info']; 

  
  $query = 'INSERT INTO infoclub 
  (
    id_equipe,
	objet,
	message,
	state,
	id_club,
	date_record,
	id_info,
	date_info,
	heure_info
	) 
	VALUES 
	(
	"'.$id_equipe.'",
	"'.$objet.'",
	"'.$message.'",
	"'.$state.'",
	"'.$id_club.'",
	NOW(),
	"null",
	"'.$date_info.'",
	"'.$heure_info.'"
	)';
  //echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysqli_error($db->con));
  if ($result == 1)
  {
	  echo 'insert passed';
  }
  else
  {
	  echo 'insert failed';
  }
?>