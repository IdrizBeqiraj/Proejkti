<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cars WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $model = trim($_POST['model']);
    $price = trim($_POST['price']);

    $query = "UPDATE cars SET model = :model, price = :price WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body>

<div class="container mt-4">
    <h2>Edit Car</h2>
    <form action="edit-car.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
        <div class="form-group">
            <label>Model:</label>
            <input type="text" name="model" class="form-control" value="<?php echo $car['model']; ?>" required>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" value="<?php echo $car['price']; ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Car</button>
    </form>
</div>

</body>
</html>
