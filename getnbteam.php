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
 
  

$club = $_GET['id_club'];
$cat   = $_GET['cat']; 
$result = mysqli_query($db->con,"SELECT DISTINCT nb_equipe FROM categorie WHERE id_club = \"".$club."\" AND nom = \"".$cat."\"") or die(mysql_error()); 

 
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node	
    $response["categorie"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $cat = array();
		$cat["nb_equipe"] = $row["nb_equipe"];
 
        // push single product into final response array
        array_push($response["categorie"], $cat);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No cat found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>