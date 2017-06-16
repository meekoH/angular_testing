<?php 
    // Include the Database connection.
    require_once 'db_connect.php';

    // Fetch and Decode the inserted data.
    $data = json_decode(file_get_contents("php://input"));

    // Escaping special characters from submitting data & store everything in new variables.
    $prodName = mysqli_real_escape_string($con, $data->prodName);
    $prodDescrip = mysqli_real_escape_string($con, $data->prodDescrip);
    $prodPrice = mysqli_real_escape_string($con, $data->prodPrice);
    $prodStock = mysqli_real_escape_string($con, $data->prodStock);
    $prodImg = mysqli_real_escape_string($con, $data->prodImg);

    // mysqli insert query
    $query = "INSERT INTO testProducts (productName,productDescrip,productPrice,productStock,productImage) VALUES ('$prodName','$prodDescrip','$prodPrice','$prodStock','$prodImg')";

    // Inserting data into database
    mysqli_query($con, $query);
    echo true;
?>