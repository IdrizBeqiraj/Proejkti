<?php
include 'db.php';
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    header('Location: sign-in.php'); // Redirect if not logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car = $_POST['car'];
    $rental_days = $_POST['rental_days'];

    // Set the price based on car selection
    $price_per_day = 0;
    $image = "";

    switch ($car) {
        case "tesla":
            $price_per_day = 30;
            $image = "img2/tesla.jpg";
            break;
        case "skoda":
            $price_per_day = 40;
            $image = "img2/skoda.jpg";
            break;
        case "lamborghini":
            $price_per_day = 120;
            $image = "img2/lamborghini.jpg";
            break;
        case "bmw":
            $price_per_day = 50;
            $image = "img2/bmw.jpg";
            break;
    }

    // Calculate total price
    $total_price = $price_per_day * $rental_days;

    // Insert car into database
    $stmt = $conn->prepare("INSERT INTO cars (model, price, rental_days, total_price, image) VALUES (:model, :price, :rental_days, :total_price, :image)");
    $stmt->execute([
        ':model' => $car, 
        ':price' => $price_per_day,
        ':rental_days' => $rental_days,
        ':total_price' => $total_price,
        ':image' => $image
    ]);

    // Redirect to admin page after adding
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <h2>Add New Car</h2>
        <form action="add-car.php" method="POST">
            <div class="form-group">
                <label for="car">Choose a car model:</label>
                <select name="car" id="car" class="form-control">
                    <option value="tesla">Tesla Model 3</option>
                    <option value="skoda">Skoda Octavia</option>
                    <option value="lamborghini">Lamborghini Huracan</option>
                    <option value="bmw">BMW X5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rental_days">Rental Days:</label>
                <input type="number" name="rental_days" class="form-control" min="1" value="1" required>
            </div>

            <button type="submit" class="btn btn-success">Add Car</button>
        </form>
    </div>
</body>
</html>
