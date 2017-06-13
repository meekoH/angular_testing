<?php
    // Get the DB Connection File.
    require_once "db_connect.php";

    // Grab everything from the test_products table, order them in ascending order by the productID.
    $query = "SELECT * from testProducts ORDER BY productID ASC";

    // Store the connection details and query itself in the $result variable.
    $result = mysqli_query($con, $query);

    // Lets start off with an empty array we can fill with objects.
    $arr = array();

    // Return the results pulled from the DB. If there are no rows left in the table, stop looping.
    if(mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // Store the results of the row into our previously made array.
            $arr[] = $row;
        }
    }

    // Return a JSON array containing the data pulled from the DB.
    echo $json_info = json_encode($arr);
?>