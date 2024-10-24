<?php

    $sname = "localhost"; // Corrected the variable name to $sname
    $uname = "root";
    $password = "";
    $db_name = "sales_comission";

    // Create connection
    $conn = mysqli_connect($sname, $uname, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }
?>