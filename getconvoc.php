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

//result = mysqli_query($db->con,"SELECT DISTINCT categorie,id_club,password FROM categorie WHERE sport = \"".$sport."\" AND dep = \"".$dep."\" AND club = \"".$club."\"" ) or die(mysql_error()); 

//$result = mysqli_query($db->con,"SELECT DISTINCT adversaire,date_match,heure_rdv,heure_match,lieu_rdv,lieu_match,liste_joueurs,liste_dirigeants FROM convocation WHERE id_club=\"".$id_club."\" AND id_equipe = \"".$id_equipe."\"") or die(mysql_error());

$result = mysqli_query($db->con,"SELECT * FROM convocation WHERE id_club=\"".$id_club."\" AND id_equipe = \"".$id_equipe."\"") or die('Échec de la requête : ' . mysqli_error($db->con));



 



 

// check for empty result

if (mysqli_num_rows($result) > 0) {

    // looping through all results

    // products node

    $response["convocation"] = array();

 

    while ($row = mysqli_fetch_array($result)) {

        // temp user array

        $convocation = array();

        $convocation["adversaire"] = $row["adversaire"];

        $convocation["date_match"] = $row["date_match"];

        $convocation["heure_rdv"] = $row["heure_rdv"];

        $convocation["heure_match"] = $row["heure_match"];

		$convocation["lieu_rdv"] = $row["lieu_rdv"];

		$convocation["lieu_match"] = $row["lieu_match"];

		$convocation["liste_joueurs"] = $row["liste_joueurs"];

		$convocation["liste_dirigeants"] = $row["liste_dirigeants"];

		$convocation["id_convoc"] = $row["id_convoc"];

		$convocation["id_equipe"] = $row["id_equipe"];

		$convocation["state"] = $row["state"];

		$convocation["lieu"] = $row["lieu"];

		$convocation["competition"] = $row["competition"];

		$convocation["date_record"] = $row["date_record"];

		$convocation["id_club"] = $row["id_club"];

 

        // push single product into final response array

        array_push($response["convocation"], $convocation);

    }

    // success

    $response["success"] = 1;

 

    // echoing JSON response

    echo json_encode($response);
    echo json_last_error_msg();

} else {

    // no products found

    $response["success"] = 0;

    $response["message"] = "No convocation found";

 

    // echo no users JSON

    echo json_encode($response);

}

?>