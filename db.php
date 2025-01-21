<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_auth"; 

try {
    
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }


    echo "Connected successfully to the database:";

} catch (Exception $e) {
    
    die("Error: " . $e->getMessage());
}
?>
