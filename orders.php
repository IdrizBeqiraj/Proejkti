<?php
session_start();
require 'car_rental_db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php");
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id");
    $stmt->execute([':user_id' => $user_id]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <table class="table">
            <tr>
                <th>Car</th>
                <th>Days</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($orders as $order) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['car_name']); ?></td>
                    <td><?php echo $order['rental_days']; ?></td>
                    <td>$<?php echo $order['total_price']; ?></td>
                    <td>
                        <a href="edit_order.php?id=<?php echo $order['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
