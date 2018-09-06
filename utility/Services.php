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

    function sendEmailToSupervisor($email, $message){
        $subject = "Confirmation of Candidate Seminar Form ( csepostgraduateseminar@gmail.com )";
        $this->sendEmails($email, $subject, $message);
    }


    function sendEmailToStudent($email, $message) {
        $subject = "Seminar Form Submitted";
        $this->sendEmails($email, $subject, $message);
    }


    function sendEmailToAdmin( $message) {
        $email = "csepostgraduateseminar@gmail.com";
        $subject = "Notification of form submission";
        $this->sendEmails($email, $subject, $message);
    }


    function sendEmails($email, $subject, $message) {

        $to = $email;

        $mail = new PHPMailer;
//        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "smtp.mailgun.org";
        $mail->SMTPAuth = true;
        $mail->Username = "postmaster@taxit.com.ng";
        $mail->Password = "15334956962b181550819c611adcc7e0";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->From = 'scepostgraduateseminar@gmail.com';
        $mail->FromName = "Dr Segun Aina";

        $mail->addAddress($to);
        $mail->isHTML(true);


        $mail->Subject = $subject;
        $mail->Body = $message;

        if(!$mail->send())
        {
            echo "Mail Error";
//            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}