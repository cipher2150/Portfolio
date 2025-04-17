<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subscribe = $_POST['subscribe'];

    $mail = new PHPMailer(true);

    try {
        // SMTP config
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'cipher2150@gmail.com';      // 🟡 Replace this
        $mail->Password   = 'cuhz ypnq nxem trtq';         // 🟡 Replace this with your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender & recipient
        $mail->setFrom($email, 'Visitor');
        $mail->addAddress('cipher2150@gmail.com');       // 🟡 Your email to receive messages

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Portfolio Contact Message';
        $mail->Body    = "<strong>Email:</strong> $email<br>
                          <strong>Message:</strong> $message<br>
                          <strong>Subscribe:</strong> $subscribe";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message failed: {$mail->ErrorInfo}'); window.location.href='contact.html';</script>";
    }
}
?>