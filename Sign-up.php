<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

    // Check if the username already exists
    $checkUserQuery = "SELECT id FROM users WHERE username = :username";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Username already exists. Please choose a different one.";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Sign-up successful!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2]; // PDO error info
        }
    }
}
?>
