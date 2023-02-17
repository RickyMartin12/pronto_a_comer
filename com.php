<?php

define("HOST", "containers-us-west-200.railway.app");     // The host you want to connect to.
define("USER", "root");    // The database username.
define("PASSWORD", "VdyzWDBMIyboZh1cJkKe");    // The database password.
define("DATABASE", "railway");    // The database name.
define("PORT", "5792"); 


// Connect to the database
$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE, PORT);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

mysqli_close($link);

?>