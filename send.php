<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
if(isset($_POST["send"])){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sgor16531@gmail.com';
    $mail->Password = 'inleejhyjakkfyla';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('sgor16531@gmail.com');

    $conn = new mysqli("localhost", "root", "", "forgot");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $_POST["nEmail"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        echo "<script>alert('Error: email not found.')</script>";
        return;
    }

    $verification_code = rand(100000, 999999);
    $_SESSION["verification_code"] = $verification_code;
    $_SESSION["email"] = $_POST["nEmail"];

    $mail->addAddress($_POST["nEmail"]);
    $mail->isHTML(true);
    $mail->Subject = 'Verification Code';
    $mail->Body = 'Your verification code is: ' . $verification_code;

    if ($mail->send()) {
      header('Location:confPassword.php');
      exit();        
    } else {
        echo "<script>alert('Error: Unable to send email. Please try again later.')</script>";
        return;
    }
}
?>