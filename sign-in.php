<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    
    if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if (password_verify($password, $user['password'])) {
            session_start();
            session_regenerate_id(true);  
            $_SESSION['user'] = $user['username'];

            
            header("Location: index.html");
            exit;
        } else {
            
            echo "<script>alert('Invalid password. Please try again.'); window.location.href = 'sign-up.html';</script>";
        }
    } else {
        
        echo "<script>alert('User not found. Please register first.'); window.location.href = 'sign-up.html';</script>";
    }

    
    $conn = null;
}
?>
