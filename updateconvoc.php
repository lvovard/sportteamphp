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
  $lieu_match   = $_GET['lieu_match']; 
  $heure_match   = $_GET['heure_match']; 
  $lieu_rdv   = $_GET['lieu_rdv']; 
  $heure_rdv   = $_GET['heure_rdv']; 
  $adversaire   = $_GET['adversaire'];
  $liste_joueurs   = $_GET['liste_joueurs'];
  $liste_dirigeants   = $_GET['liste_dirigeants'];
  $state   = $_GET['state'];
  $id_club   = $_GET['id_club'];  
  $lieu   = $_GET['lieu'];  
  $competition   = $_GET['competition'];  
  $id_convoc   = $_GET['id_convoc'];  
  
  $query = 'UPDATE convocation SET 
		id_equipe = "'.$id_equipe.'",
		date_match = "'.$date_match.'",
		lieu_match = "'.$lieu_match.'",
		heure_match = "'.$heure_match.'",
		lieu_rdv = "'.$lieu_rdv.'",
		heure_rdv = "'.$heure_rdv.'",
		adversaire = "'.$adversaire.'",
		liste_joueurs = "'.$liste_joueurs.'",
		liste_dirigeants = "'.$liste_dirigeants.'",
		state = "'.$state.'",
		id_club = "'.$id_club.'",
		lieu = "'.$lieu.'",
		competition = "'.$competition.'",
		lieu = "'.$lieu.'",
		date_record = NOW()
    WHERE id_convoc = "'.$id_convoc.'"';
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