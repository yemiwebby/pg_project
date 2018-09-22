<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 28/07/2018
 * Time: 6:27 AM
 */

require 'vendor/autoload.php';
include('./database/Database.php');
use PHPMailer\PHPMailer\PHPMailer;


class Services
{

    public function sendEmailToSupervisor($email, $message)
    {
        $subject = "Confirmation of Candidate Seminar Form ( csepostgraduateseminar@gmail.com )";
        $this->sendEmails($email, $subject, $message);
    }


    public function sendEmailToStudent($email, $message)
    {
        $subject = "Seminar Form Submitted";
        $this->sendEmails($email, $subject, $message);
    }


    public function sendEmailToAdmin( $message)
    {
        $email = "csepostgraduateseminar@gmail.com";
        $subject = "Notification of form submission";
        $this->sendEmails($email, $subject, $message);
    }


    public function sendEmails($email, $subject, $message)
    {

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

    public function finalSemesterUsingLeaveOfAbsence($student_mat_no, $leave_of_absence)
    {
        if ($leave_of_absence && $leave_of_absence != 'none') {
            $calculated_semester = $this->calculateSemester($student_mat_no);
            if ($leave_of_absence >= $calculated_semester) {
               return $calculated_semester;
            }
            $final_semester = floatval($calculated_semester) - floatval($leave_of_absence);
            return $final_semester;
        }

        $calculated_semester = $this->calculateSemester($student_mat_no);
        return $calculated_semester;
    }

    function calculateSemester($student_mat_no) {
//Harmattan is the first semester denoted with H
//            Rain is the second semester denoted with R
        $database = new Database();
        $semester = $database->getCurrentSemester();
        $admin_semester = $this->extractSemester($semester);
        $student_semester = $this->extractSemester($student_mat_no);
        $year = $this->calculateYear($this->extractSession($student_mat_no));
        $new_semester = '';

        if ($admin_semester == 'R' && $student_semester == 'R') {
            $new_semester = floatval($year) * 2;
        }
        elseif ($admin_semester == 'H' && $student_semester == 'H') {
            $new_semester = (floatval($year) * 2) - 1;
        } else {
            $new_semester = (floatval($year) * 2) - 1;
        }

        return $new_semester;
    }

    function extractSession($string) {
        $new_mat = substr($string, 3, +5);
        $no_slash = stripslashes(str_replace('/', '', $new_mat));
        return $no_slash;
    }

    function extractSemester($string) {
        $semester = substr($string, 9, +1);
        return $semester;
    }

    function calculateYear($student_session) {
        $database = new Database();
        $semester = $database->getCurrentSemester();
        $admin_session = $this->extractSession($semester);
        $year = floatval($admin_session) - floatval($student_session);
        $ext_year = substr($year, 0, 1);
        return $ext_year;
    }
}