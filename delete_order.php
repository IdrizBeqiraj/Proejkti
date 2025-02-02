<?php
session_start();
require 'car_rental_db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php");
    exit;
}

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM orders WHERE id = :id");
        $stmt->execute([':id' => $order_id]);

        header("Location: orders.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
