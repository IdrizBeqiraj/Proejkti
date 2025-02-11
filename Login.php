<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/rent a car website/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/rent a car website/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/rent a car website/PHPMailer-master/src/SMTP.php';


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "rent_a_car";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['contact_name']) ? $_POST['contact_name'] : '';
    $email = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
    $message = isset($_POST['contact_message']) ? $_POST['contact_message'] : '';

    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Message saved to database.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'idriz.beqiraj@gmail.com'; 
        $mail->Password = 'maaw whrc nzhx ebbe'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('idriz.beqiraj@gmail.com', 'Contact Form');
        $mail->addAddress('idriz.beqiraj@gmail.com');

        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

        $mail->send();
        echo 'Message has been sent successfully.';
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} 
else {
    echo "No form submitted.";
}

$conn->close();
?>
