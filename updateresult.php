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
  $date_match   = $_GET['date_match']; 
  $adversaire   = $_GET['adversaire'];
  $score_equipe   = $_GET['score_equipe'];
  $score_adversaire   = $_GET['score_adversaire'];
  $state   = $_GET['state'];
  $id_club   = $_GET['id_club'];  
  $lieu   = $_GET['lieu'];  
  $competition   = $_GET['competition'];  
  $id_resultat   = $_GET['id_resultat']; 
  $detail   = $_GET['detail'];   
  
  $query = 'UPDATE resultat SET 
		id_equipe = "'.$id_equipe.'",
		date_match = "'.$date_match.'",
		adversaire = "'.$adversaire.'",
		score_equipe = "'.$score_equipe.'",
		score_adversaire = "'.$score_adversaire.'",
		state = "'.$state.'",
		id_club = "'.$id_club.'",
		lieu = "'.$lieu.'",
		competition = "'.$competition.'",
		detail = "'.$detail.'",
		date_record = NOW()
    WHERE id_resultat = "'.$id_resultat.'"';
  //echo '+++'.$query.'+++\n';
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