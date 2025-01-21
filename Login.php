<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/laragon/www/rent a car website/PHPMailer-master/src/Exception.php';
require 'C:/laragon/www/rent a car website/PHPMailer-master/src/PHPMailer.php';
require 'C:/laragon/www/rent a car website/PHPMailer-master/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['contact_name']) ? $_POST['contact_name'] : '';
    $email = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
    $message = isset($_POST['contact_message']) ? $_POST['contact_message'] : '';

    
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

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
?>
