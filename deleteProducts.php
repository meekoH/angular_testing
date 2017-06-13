<?php 
    // Include the Database connection.
    require_once 'db_connect.php';

    // Fetch and Decode the inserted data.
    $data = json_decode(file_get_contents("php://input"));

    // mysqli delete query
    $query = "DELETE FROM testProducts WHERE productID=$data->prodID";

    // Inserting data into database
    mysqli_query($con, $query);
    echo true;
?>