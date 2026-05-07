<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cit215_project"; 

//Creating an SQL connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Testing SQL Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>