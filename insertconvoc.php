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
  $date_match = $_GET['date_match'];
  $lieu_match   = $_GET['lieu_match'];
  $heure_match   = $_GET['heure_match'];
  $lieu_rdv   = $_GET['lieu_rdv'];
  $heure_rdv   = $_GET['heure_rdv'];
  $adversaire  = $_GET['adversaire']; 
  $liste_joueurs  = $_GET['liste_joueurs']; 
  $liste_dirigeants  = $_GET['liste_dirigeants']; 
  $state = $_GET['state'];
  $lieu = $_GET['lieu'];
  $competition = $_GET['competition'];
  $id_club = $_GET['id_club'];  
  //$result = mysqli_query($db->con,"INSERT INTO club (sport,dep,club,email,password,id_club) VALUES (".$sport.",".$dep.",".$club.",".$email.",".$pwd.")") or die(mysql_error()); 
  $query = 'INSERT INTO convocation 
  (
    id_equipe,
	date_match,
	lieu_match,
	heure_match,
	lieu_rdv,
	heure_rdv,
	adversaire,
	liste_joueurs,
	liste_dirigeants,
	state,
    lieu,
	competition,
	id_club,
	date_record,
	id_convoc
	) 
	VALUES 
	(
	"'.$id_equipe.'",
	"'.$date_match.'",
	"'.$lieu_match.'",
	"'.$heure_match.'",
	"'.$lieu_rdv.'",
	"'.$heure_rdv.'",
	"'.$adversaire.'",
	"'.$liste_joueurs.'",
	"'.$liste_dirigeants.'",
	"'.$state.'",
	"'.$lieu.'",
	"'.$competition.'",
	"'.$id_club.'",
	NOW(),
	"null"
	)';
  //echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysqli_error($db->con));
  if ($result == 1)
  {
	  echo 'insert passed:'.mysqli_insert_id($db->con);
  }
  else
  {
	  echo 'insert failed';
  }
?>