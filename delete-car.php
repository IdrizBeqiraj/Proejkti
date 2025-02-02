<?php
include 'db.php';
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php'); // Redirect if not logged in
    exit();
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
