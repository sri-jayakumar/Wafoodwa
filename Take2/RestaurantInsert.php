<?php
    include_once("./library.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Form the SQL query (an INSERT query)
    $sql="INSERT INTO restaurant (restaurants_name, restaurants_location_address, restaurants_url)
    VALUES
    ('$_POST[restaurants_name]','$_POST[restaurants_location_address]','$_POST[restaurants_url]')";

    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }
    echo "1 record added"; // Output to user
    mysqli_close($con);
?>