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
  $id_equipe           = $_GET['id_equipe'];
  $date_entrainement   = $_GET['date_entrainement'];
  $lieu_entrainement   = $_GET['lieu_entrainement'];
  $heure_entrainement  = $_GET['heure_entrainement']; 
  $liste_joueurs       = $_GET['liste_joueurs']; 
  $liste_dirigeants    = $_GET['liste_dirigeants']; 
  $state               = $_GET['state'];
  $id_club             = $_GET['id_club'];  
  echo 'date_entrainement:'.$date_entrainement;
  $query = 'INSERT INTO entrainement 
  (
    id_equipe,
	date_entrainement,
	lieu_entrainement,
	heure_entrainement,
	liste_joueurs,
	liste_dirigeants,
	state,
	id_club,
	date_record,
	id_entrainement
  ) 
  VALUES 
  (
    "'.$id_equipe.'",
	"'.$date_entrainement.'",
	"'.$lieu_entrainement.'",
	"'.$heure_entrainement.'",
	"'.$liste_joueurs.'",
	"'.$liste_dirigeants.'",
	"'.$state.'",
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