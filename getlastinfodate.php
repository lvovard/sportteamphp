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



$query = "SELECT DISTINCT * FROM infoclub WHERE date_record > \"".$date_record."\" AND id_club=\"".$id_club."\" AND id_equipe LIKE \"%".$id_equipe."%\"   ORDER BY date_record DESC";

$result = mysqli_query($db->con,"SELECT DISTINCT * FROM infoclub WHERE date_record > \"".$date_record."\" AND id_club=\"".$id_club."\" AND id_equipe LIKE \"%".$id_equipe."%\"   ORDER BY date_record DESC") or die('Échec de la requête : ' . mysqli_error($db->con));



// check for empty result

if (mysqli_num_rows($result) > 0) {

    // looping through all results

    // products node

    $response["infoclub"] = array();

 

    while ($row = mysqli_fetch_array($result)) {

        // temp user array

        $infoclub = array();

		$infoclub["id_info"] = $row["id_info"];

		$infoclub["id_equipe"] = $row["id_equipe"];

		$infoclub["state"] = $row["state"];

		$infoclub["objet"] = $row["objet"];

		$infoclub["message"] = $row["message"];

		$infoclub["date_record"] = $row["date_record"];

		$infoclub["id_club"] = $row["id_club"];

		$infoclub["date_info"] = $row["date_info"];

		$infoclub["heure_info"] = $row["heure_info"];



		

		

 

        // push single product into final response array

        array_push($response["infoclub"], $infoclub);

    }

    // success

    $response["success"] = 1;

 

    // echoing JSON response

    echo json_encode($response);

} else {

    // no products found

    $response["success"] = 0;

    $response["message"] = "No info found";

 

    // echo no users JSON

    echo json_encode($response);

}

?>