<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php'); // Redirect if not logged in
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); 
}
?>
