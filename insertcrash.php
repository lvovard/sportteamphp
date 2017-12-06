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
 

  $content = $_GET['content'];
  $query = 'INSERT INTO crashinfo (content,date_record) VALUES ("'.$content.'",NOW())';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysql_error());
  if ($result == 1)
  {
	  echo 'insert passed';
  }
  else
  {
	  echo 'insert failed';
  }
?>