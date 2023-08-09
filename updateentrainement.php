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

  $date_entrainement   = $_GET['date_entrainement']; 
  $lieu_entrainement   = $_GET['lieu_entrainement'];  
  $heure_entrainement  = $_GET['heure_entrainement']; 
  $liste_joueurs   = $_GET['liste_joueurs'];
  $liste_dirigeants   = $_GET['liste_dirigeants'];
  $state   = $_GET['state'];
  $id_club   = $_GET['id_club'];   
  $id_entrainement   = $_GET['id_entrainement'];  
  
  $query = 'UPDATE entrainement SET 
		date_entrainement = "'.$date_entrainement.'",
		lieu_entrainement = "'.$lieu_entrainement.'",
		heure_entrainement = "'.$heure_entrainement.'",
		liste_joueurs = "'.$liste_joueurs.'",
		liste_dirigeants = "'.$liste_dirigeants.'",
		state = "'.$state.'",
		id_club = "'.$id_club.'",
		date_record = NOW()
    WHERE id_entrainement = "'.$id_entrainement.'"';
  //echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysqli_error($db->con));
  if ($result == 1)
  {
	  echo 'update passed:'.$id_entrainement;
  }
  else
  {
	  echo 'update failed';
  }
?>