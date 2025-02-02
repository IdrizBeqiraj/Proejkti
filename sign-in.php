<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if user exists
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session variable for user
        $_SESSION['user_id'] = $user['id']; // Store user_id in session (use user ID instead of email)
        header("Location: index.php");  // Redirect to index.php after login
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/Style.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Sign In</h2>
        <form action="sign-in.php" method="POST">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <p class="mt-3 text-center">Don't have an account? <a href="sign-up.php">Sign up here</a></p>
        </form>
    </div>
</body>
</html>
