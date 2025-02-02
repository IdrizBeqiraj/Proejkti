<?php
// delete_order.php

session_start();
require 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php"); // Redirect if not logged in
    exit();
}

// Get the order ID from the URL
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Prepare the query to delete the order from the orders table
    try {
        $stmt = $conn->prepare("DELETE FROM orders WHERE id = :order_id AND user_id = :user_id");
        $stmt->execute([':order_id' => $order_id, ':user_id' => $_SESSION['user_id']]);

        // Redirect to orders page after deletion
        header("Location: orders.php?deleted=true");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // If no order ID is provided, redirect to orders page
    header("Location: orders.php");
    exit();
}
?>
