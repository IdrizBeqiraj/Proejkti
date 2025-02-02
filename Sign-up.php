<?php
// Include the database connection file
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    try {
        // Prepare the SQL query
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Redirect after successful sign-up
        header('Location: sign-in.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/Style.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Sign Up</h2>
        <form method="POST" action="sign-up.php">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            <p class="mt-3 text-center">Already have an account? <a href="sign-in.php">Sign in here</a></p>
        </form>
    </div>
</body>
</html>
