<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "mail/PHPMailer.php";
require "mail/Exception.php";
require "mail/SMTP.php";

$email = $_GET["email"];

if (empty($email)) {
    echo ("Please Enter Your Email Address");
} else {

    $conn = new mysqli("host", "uname", "password", "chat_db", 3306);

    $q1 = "SELECT * FROM `users` WHERE `email` = '" . $email . "';";
    $rs1 = $conn->query($q1);

    if ($rs1->num_rows == 1) {

        $row = $rs1->fetch_assoc();
        $uid = $row["id"];

        $vcode = uniqid();

        $q2 = "UPDATE `users` SET `v_code` = '$vcode' WHERE `id` = '$uid';";
        $conn->query($q2);

        //Email Sending
        $mail = new PHPMailer(true);

        try {
            //Server settings         
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'Youremail';           //SMTP username
            $mail->Password   = 'password';                     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('personal.charuka@gmail.com', 'Charuka');
            $mail->addAddress($email);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Chat App | Account Password Reset';
            $mail->Body    =
                '<table style="font-family: Arial, Helvetica, sans-serif;">
            <tr>
                <td>
                    <h1>Reset Password</h1>
                </td>
            </tr>
        
            <tr>
                <td>
                    <a href="http://localhost/chat/reset-password.php?code=' . $vcode . '">RESET</a>
                </td>
            </tr>
        
            </table>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo ("Inavalid User !");
    }
}
