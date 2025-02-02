<?php
session_start();
require 'db.php';  // Assuming the database connection is here

// Fetch orders
try {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $_SESSION['user_id']]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Fetch cars
try {
    $stmt = $conn->prepare("SELECT * FROM cars");
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Cars & Orders</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>

<!-- Orders Section -->
<h2>Your Orders</h2>
<?php if (isset($orders) && !empty($orders)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Car</th>
                <th>Rental Days</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['car_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['rental_days']); ?></td>
                    <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                    <td>
                        <a href="edit_order.php?id=<?php echo $order['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No orders found.</p>
<?php endif; ?>

<!-- Cars Section -->
<h2>Available Cars</h2>
<?php if (isset($cars) && !empty($cars)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Car Name</th>
                <th>Car Model</th>
                <th>Price per Day</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo htmlspecialchars($car['car_name']); ?></td>
                    <td><?php echo htmlspecialchars($car['car_model']); ?></td>
                    <td><?php echo htmlspecialchars($car['price_per_day']); ?></td>
                    <td>
                        <a href="edit_car.php?id=<?php echo $car['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_car.php?id=<?php echo $car['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No cars available.</p>
<?php endif; ?>

</body>
</html>
