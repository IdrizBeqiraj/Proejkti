<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $username;
        echo "<script>alert('Login successful!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href = 'sign-in.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=a"width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/Style.css" rel="stylesheet"/>
    <style>
       body {
    background: #ffffff; /* White background */
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.card {
    width: 400px;
    padding: 25px;
    border-radius: 20px; /* More rounded corners */
    border: 2px solid #000; /* Black border */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background: #fff;
    position: relative;
    top: -50px; /* Moves form higher */
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #000;
    border-radius: 10px;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 10px;
    background: #007bff;
    color: white;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}
        .btn-primary {
            background: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="text-center mb-3">Login</h2>
        <form action="sign-in.php" method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <p class="mt-3 text-center">Don't have an account? <a href="sign-up.php">Sign up here</a></p>
        </form>
    </div>
</body>
</html>
