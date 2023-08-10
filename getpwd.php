<?php
 

 
// array for JSON response
$response = array();
 

 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
$id_club = $_GET['id_club'];
$result = mysqli_query($db->con,"SELECT DISTINCT password,password_admin FROM club WHERE id_club = \"".$id_club."\"") or die(mysql_error()); 

 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["club"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $password = array();
        $password["password"] = $row["password"];
		$password["password_admin"] = $row["password_admin"];
 
        // push single product into final response array
        array_push($response["club"], $password);
    }
    // success
    $response["success"] = 1;
	$response["requestmsg"] = "password found";
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["requestmsg"] = "No password found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>