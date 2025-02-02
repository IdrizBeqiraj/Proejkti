<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php");
    exit;
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $car_name = isset($_POST['car_name']) ? $_POST['car_name'] : '';
    $rental_days = isset($_POST['rental_days']) ? intval($_POST['rental_days']) : 0;
    $price_per_day = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;

    // Validate input
    if ($rental_days < 1 || $price_per_day <= 0 || empty($car_name)) {
        echo "Invalid order details.";
        exit;
    }

    $total_price = $rental_days * $price_per_day;

    try {
        // Ensure orders table exists
        $stmt = $conn->query("SHOW TABLES LIKE 'orders'");
        if ($stmt->rowCount() == 0) {
            // Create table if it doesn't exist
            $conn->exec("
                CREATE TABLE orders (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    user_id INT NOT NULL,
                    car_name VARCHAR(255) NOT NULL,
                    rental_days INT NOT NULL,
                    total_price DECIMAL(10,2) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
                )
            ");
        }

        
        $stmt = $conn->prepare("INSERT INTO orders (user_id, car_name, rental_days, total_price) 
                                VALUES (:user_id, :car_name, :rental_days, :total_price)");
        $stmt->execute([
            ':user_id' => $user_id,
            ':car_name' => $car_name,
            ':rental_days' => $rental_days,
            ':total_price' => $total_price
        ]);

        
        header("Location: orders.php");
        exit();

    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>
