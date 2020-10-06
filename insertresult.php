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
  $date_match = $_GET['date_match'];
  $adversaire  = $_GET['adversaire']; 
  $id_equipe = $_GET['id_equipe'];
  $state = $_GET['state'];
  $lieu = $_GET['lieu'];
  $competition = $_GET['competition'];
  $id_club = $_GET['id_club'];  
  $score_equipe = $_GET['score_equipe'];  
  $score_adversaire = $_GET['score_adversaire']; 
  $detail = $_GET['detail'];   

  
  $query = 'INSERT INTO resultat 
  (
    id_equipe,
	date_match,
	adversaire,
	state,
    lieu,
	competition,
	id_club,
	score_equipe,
	score_adversaire,
	date_record,
	id_resultat,
	detail
	) 
	VALUES 
	(
	"'.$id_equipe.'",
	"'.$date_match.'",
	"'.$adversaire.'",
	"'.$state.'",
	"'.$lieu.'",
	"'.$competition.'",
	"'.$id_club.'",
	"'.$score_equipe.'",
	"'.$score_adversaire.'",
	NOW(),
	"null",
	"'.$detail.'"
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