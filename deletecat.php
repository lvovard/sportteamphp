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

 



  $id_cat = $_GET['id_cat'];

  //$query = 'INSERT INTO joueur (id,nom,prenom,id_club) VALUES ("","'.$nom.'","'.$prenom.'","'.$idclub.'")';

  $query = 'DELETE FROM categorie WHERE id_cat = '.$id_cat;

  echo '+++'.$query.'+++\n';

  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysql_error());

  if ($result == 1)

  {

	  echo 'delete passed';

  }

  else

  {

	  echo 'delete failed';

  }

?>



