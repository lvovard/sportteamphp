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
$id_equipe = $_GET['id_equipe'];
$date_record = $_GET['date_record'];

$allcat = 'all-';

$query = "SELECT DISTINCT * FROM resultat WHERE date_record > \"".$date_record."\" AND id_club=\"".$id_club."\" AND  id_equipe LIKE \"%".$id_equipe."%\"  ORDER BY date_record DESC";
$result = mysqli_query($db->con,"SELECT DISTINCT * FROM resultat WHERE date_record > \"".$date_record."\" AND id_club=\"".$id_club."\" AND id_equipe LIKE \"%".$id_equipe."%\"  ORDER BY date_record DESC") or die('Échec de la requête : ' . mysqli_error($db->con));

    
 

 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["resultat"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
		$resultat["id_equipe"] = $row["id_equipe"];
		$resultat["date_match"] = $row["date_match"];
        $resultat["adversaire"] = $row["adversaire"];
		$resultat["score_equipe"] = $row["score_equipe"];
		$resultat["score_adversaire"] = $row["score_adversaire"];
		$resultat["state"] = $row["state"];
		$resultat["lieu"] = $row["lieu"];
		$resultat["competition"] = $row["competition"];
		$resultat["date_record"] = $row["date_record"];
        $resultat["id_club"] = $row["id_club"];
        $resultat["id_resultat"] = $row["id_resultat"];
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