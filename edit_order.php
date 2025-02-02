<?php
session_start();
require 'car_rental_db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $rental_days = $_POST['rental_days'];

    try {
        $stmt = $conn->prepare("UPDATE orders SET rental_days = :rental_days, total_price = rental_days * (SELECT total_price / rental_days FROM orders WHERE id = :id) WHERE id = :id");
        $stmt->execute([
            ':rental_days' => $rental_days,
            ':id' => $order_id
        ]);

        header("Location: orders.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
