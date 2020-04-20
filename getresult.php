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

$db->con->set_charset("utf8");
 

$id_club = $_GET['id_club'];
$id_equipe = $_GET['id_equipe'];
$result = mysqli_query($db->con,"SELECT * FROM resultat WHERE id_club=\"".$id_club."\" AND id_equipe = \"".$id_equipe."\"") or die('Échec de la requête : ' . mysqli_error($db->con));

 

 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["resultat"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $resultat = array();
        $resultat["adversaire"] = $row["adversaire"];
        $resultat["date_match"] = $row["date_match"];
		$resultat["id_resultat"] = $row["id_resultat"];
		$resultat["id_equipe"] = $row["id_equipe"];
		$resultat["state"] = $row["state"];
		$resultat["lieu"] = $row["lieu"];
		$resultat["competition"] = $row["competition"];
		$resultat["date_record"] = $row["date_record"];
		$resultat["score_equipe"] = $row["score_equipe"];
		$resultat["score_adversaire"] = $row["score_adversaire"];
		$resultat["id_club"] = $row["id_club"];
		$resultat["detail"] = $row["detail"];
 
        // push single product into final response array
        array_push($response["resultat"], $resultat);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No resultat found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>