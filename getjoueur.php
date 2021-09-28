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

//result = mysqli_query($db->con,"SELECT DISTINCT categorie,id_club,password FROM categorie WHERE sport = \"".$sport."\" AND dep = \"".$dep."\" AND club = \"".$club."\"" ) or die(mysql_error()); 

$result = mysqli_query($db->con,"SELECT DISTINCT nom,prenom,role,id_cat,id_joueur FROM joueur WHERE id_club=\"".$id_club."\"") or die(mysql_error());


// check for empty result

if (mysqli_num_rows($result) > 0) {

    // looping through all results

    // products node

    $response["joueur"] = array();

 

    while ($row = mysqli_fetch_array($result)) {

        // temp user array

        $joueur = array();

        $joueur["nom"] = $row["nom"];

        $joueur["prenom"] = $row["prenom"];

        $joueur["role"] = $row["role"];

        $joueur["id_cat"] = $row["id_cat"];

		$joueur["id_joueur"] = $row["id_joueur"];

 

        // push single product into final response array

        array_push($response["joueur"], $joueur);

    }

    // success

    $response["success"] = 1;

 

    // echoing JSON response

    echo json_encode($response);

} else {

    // no products found

    $response["success"] = 0;

    $response["message"] = "No joueur found";

 

    // echo no users JSON

    echo json_encode($response);

}

?>