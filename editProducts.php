<?php 
    // Include the Database connection.
    require_once 'db_connect.php';

    // Fetch and Decode the inserted data.
    $data = json_decode(file_get_contents("php://input"));

    // Escaping special characters from submitting data & store everything in new variables.
    $prodID = mysqli_real_escape_string($con, $data->productID);
    $prodName = mysqli_real_escape_string($con, $data->productName);
    $prodDescrip = mysqli_real_escape_string($con, $data->productDescrip);
    $prodPrice = mysqli_real_escape_string($con, $data->productPrice);
    $prodStock = mysqli_real_escape_string($con, $data->productStock);
    $prodImg = mysqli_real_escape_string($con, $data->productImage);

    $query = "UPDATE testProducts SET productName = '$prodName', productDescrip = '$prodDescrip', productPrice = '$prodPrice', productStock = '$prodStock', productImage = '$prodImg' WHERE productID = $prodID";

    // Inserting data into database
    mysqli_query($con, $query);
    echo true;
?>