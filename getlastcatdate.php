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
 

$id_club = $_GET['id_club'];
$date_record = $_GET['date_record'];

$query = "SELECT DISTINCT * FROM categorie WHERE date_record > \"".$date_record."\" AND id_club=\"".$id_club."\" ORDER BY date_record DESC";
$result = mysqli_query($db->con,$query) or die('Échec de la requête : ' . mysqli_error($db->con));

    
 

 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["categorie"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $categorie["id_club"] = $row["id_club"];
        $categorie["nom"] = $row["nom"];
        $categorie["nb_equipe"] = $row["nb_equipe"];
        $categorie["date_record"] = $row["date_record"];
		$categorie["id_cat"] = $row["id_cat"];
	
        // push single product into final response array
        array_push($response["categorie"], $categorie);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No categorie found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>