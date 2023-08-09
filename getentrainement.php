<?php

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
$db->con->set_charset("utf8");

$id_club    = $_GET['id_club'];
$id_equipe  = $_GET['id_equipe'];
$result = mysqli_query($db->con,"SELECT * FROM entrainement WHERE id_club=\"".$id_club."\" AND id_equipe = \"".$id_equipe."\"") or die('Échec de la requête : ' . mysqli_error($db->con));

// check for empty result
if (mysqli_num_rows($result) > 0)
{
    // looping through all results
    $response["entrainement"] = array();

    while ($row = mysqli_fetch_array($result)) 
    {

        // temp user array
        $entrainement = array();
        $entrainement["date_entrainement"]  = $row["date_entrainement"];
        $entrainement["heure_entrainement"] = $row["heure_entrainement"];
        $entrainement["lieu_entrainement"]  = $row["lieu_entrainement"];
	$entrainement["liste_joueurs"]      = $row["liste_joueurs"];
	$entrainement["liste_dirigeants"]   = $row["liste_dirigeants"];
	$entrainement["id_entrainement"]    = $row["id_entrainement"];
	$entrainement["state"]              = $row["state"];
	$entrainement["date_record"]        = $row["date_record"];
	$entrainement["id_club"]            = $row["id_club"];

 

        // push single product into final response array

        array_push($response["entrainement"], $entrainement);

    }

    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
    echo json_last_error_msg();

} else {

    // no products found

    $response["success"] = 0;

    $response["message"] = "No entrainement found";

 

    // echo no users JSON

    echo json_encode($response);

}

?>