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
 
$idclub = $_GET['club'];
$result = mysqli_query($db->con,"SELECT DISTINCT * FROM categorie WHERE id_club = \"".$idclub."\"") or die(mysql_error()); 

 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["categorie"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $cat = array();
        $cat["nom"] = $row["nom"];
		$cat["nb_equipe"] = $row["nb_equipe"];
		$cat["id_cat"] = $row["id_cat"];
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
    $response["message"] = "No category found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>