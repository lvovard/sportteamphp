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
 
  

$sport = $_GET['sport'];
$dep   = $_GET['dep']; 
$result = mysqli_query($db->con,"SELECT club,password,password_admin,id_club FROM club WHERE sport = \"".$sport."\" AND dep LIKE \"%".$dep."%\"") or die(mysql_error()); 

 
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["club"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $cat = array();
		$cat["club"] = $row["club"];
		$cat["password"] = $row["password"];
		$cat["password_admin"] = $row["password_admin"];
		$cat["id_club"] = $row["id_club"];
 
        // push single product into final response array
        array_push($response["club"], $cat);
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