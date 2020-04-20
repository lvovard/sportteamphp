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

$sport = $_GET['sport'];

$result = mysqli_query($db->con,"SELECT DISTINCT dep FROM club WHERE sport = \"".$sport."\"") or die(mysql_error()); 





 

// check for empty result

if (mysqli_num_rows($result) > 0) {

    // looping through all results

    // products node

    $response["departement"] = array();


    while ($row = mysqli_fetch_array($result)) {

        // temp user array

        $cat = array();

        $cat["dep"] = $row["dep"];

 

        // push single product into final response array

        array_push($response["departement"], $cat);

    }

    // success

    $response["success"] = 1;

 
    // echoing JSON response

    echo json_encode($response,JSON_UNESCAPED_UNICODE|JSON_INVALID_UTF8_IGNORE);
    echo json_last_error_msg();

} else {
echo "tata";

    // no products found

    $response["success"] = 0;

    $response["message"] = "No dep found";


    // echo no users JSON

    echo json_encode($response);

}

?>