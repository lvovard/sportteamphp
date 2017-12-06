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
 
$id_cat = $_GET['id_cat'];
$result = mysqli_query($db->con,"SELECT DISTINCT role FROM joueur WHERE id_cat = \"".$id_cat."\"") or die(mysql_error()); 

 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["joueur"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $cat = array();
        $cat["role"] = $row["role"];
 
        // push single product into final response array
        array_push($response["joueur"], $cat);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No role found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>