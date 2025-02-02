<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php");  // Redirect if user is not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Query to get orders for the current user
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $user_id]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Debugging output to see the user ID and fetched orders
    echo "User ID: $user_id";  // Check if the session user_id is set correctly
    var_dump($orders);  // Display the fetched orders for debugging
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Orders</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Your Orders</h2>

        <?php if (empty($orders)): ?>
            <p>No orders found for User ID: <?php echo htmlspecialchars($user_id); ?></p>
        <?php else: ?>
            <table class="table">
                <tr>
                    <th>Car</th>
                    <th>Rental Days</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['car_name']); ?></td>
                        <td><?php echo $order['rental_days']; ?></td>
                        <td>$<?php echo $order['total_price']; ?></td>
                        <td>
                            <a href="edit_order.php?id=<?php echo $order['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
