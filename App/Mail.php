<?php
namespace App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    // public static function sendMail($to, $subject, $text, $html)
    public function sendMail($to, $subject, $text, $html)
    {
        $mail = new PHPMailer(true);                                            // Passing `true` enables exceptions
        try {
            // Server settings
            $mail->SMTPDebug = 0;                                               //Enable SMTP debugging (0 = off (for production use) 1 = client messages 2 = client and server messages)
            $mail->isSMTP();                                                    // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                                     // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                             // Enable SMTP authentication
            $mail->Username = 'wuwu5431@gmail.com';                             // SMTP username
            $mail->Password = 'Londonas1';                                      // SMTP password
            $mail->SMTPSecure = 'tls';                                          // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                                  // TCP port to connect to

            // Recipients
            $mail->setFrom('wuwu5431@gmail.com', 'John Smith');                 //Set who the message is to be sent from
            $mail->addAddress($to);                                             //Set who the message is to be sent to / 2nd param Name is optional
            $mail->addReplyTo('cassidy@inbox.lt', 'Info');

            // Content
            $mail->isHTML(true);                                                // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $text;
            $mail->AltBody = $html;

            // Send
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

}// end of class
