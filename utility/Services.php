<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 28/07/2018
 * Time: 6:27 AM
 */

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;


class Services
{

    public function sendEmailToSupervisor($email, $message){
        $subject = "Confirmation of Candidate Seminar Form ( csepostgraduateseminar@gmail.com )";
        $this->sendEmails($email, $subject, $message);
    }


    public function sendEmailToStudent($email, $message) {
        $subject = "Seminar Form Submitted";
        $this->sendEmails($email, $subject, $message);
    }


    public function sendEmailToAdmin( $message) {
        $email = "csepostgraduateseminar@gmail.com";
        $subject = "Notification of form submission";
        $this->sendEmails($email, $subject, $message);
    }


    public function sendEmails($email, $subject, $message) {

        $to = $email;

        $mail = new PHPMailer;
//        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.mailgun.org";
        $mail->SMTPAuth = true;
        $mail->Username = "MAIL_USERNAME";
        $mail->Password = "MAIL_PASSWORD";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->From = 'info@realcodestuffs.com';
        $mail->FromName = "Dr Segun Aina";

        $mail->addAddress($to);
        $mail->isHTML(true);


        $mail->Subject = $subject;
        $mail->Body = $message;

        if(!$mail->send())
        {
            echo "Mail Error";
//            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
//            echo "Sent successfully";
        }
    }
}