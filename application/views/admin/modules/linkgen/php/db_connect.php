<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "emoneydr_main_base";

$db_connect_status;

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $db_connect_status = 0;
} else {
    $db_connect_status = 1;
}

?>
