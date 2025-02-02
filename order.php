<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: sign-in.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];
    $user_email = $_SESSION['user'];

    // Insert order into database
    $query = "INSERT INTO orders (user_email, car_id, order_date) VALUES (:user_email, :car_id, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_email', $user_email);
    $stmt->bindParam(':car_id', $car_id);
    $stmt->execute();

    echo "<script>alert('Car booked successfully!'); window.location.href = 'index.php';</script>";
} else {
    header("Location: index.php");
}
?>
