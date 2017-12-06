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
 

  $sport = $_GET['sport'];
  $dep   = $_GET['dep'];
  $club  = $_GET['club']; 
  $email = $_GET['email'];
  $pwd = $_GET['pwd'];
  $pwd_admin = $_GET['pwd_admin'];  
  //$result = mysqli_query($db->con,"INSERT INTO club (sport,dep,club,email,password,id_club) VALUES (".$sport.",".$dep.",".$club.",".$email.",".$pwd.")") or die(mysql_error()); 
  $query = 'INSERT INTO club (sport,dep,club,email,password,password_admin,id_club) VALUES ("'.$sport.'","'.$dep.'","'.$club.'","'.$email.'","'.$pwd.'","'.$pwd_admin.'","null")';
  // echo '+++'.$query.'+++\n';
  $result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysql_error());
  if ($result == 1)
  {
	  echo 'insert passed;id_club='.mysqli_insert_id($db->con).';';
  }
  else
  {
	  echo 'insert failed';
  }
?>