<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.location.href = 'sign-up.php';</script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $checkUserQuery = "SELECT id FROM users WHERE username = :username";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Username already exists. Choose a different one.'); window.location.href = 'sign-up.php';</script>";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['user'] = $username;
            echo "<script>alert('Sign-up successful! Logging in...'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error occurred. Try again later.'); window.location.href = 'sign-up.php';</script>";
        }
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
        <h2 class="text-center mb-3">Create an Account</h2>
        <form action="sign-up.php" method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            <p class="mt-3 text-center">Already have an account? <a href="sign-in.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
