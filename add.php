<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 23/09/2018
 * Time: 4:06 AM
 */

require ('connect.php');


if(isset($_POST['add-candidate'])) {
    $id = $_POST['candidate-id'];
    $email = $_POST['candidate-email'];
    $reg_number = $_POST['candidate-number'];
    $student_id = $_POST['candidate-student-id'];
    $scheduled = 0;

    $sql = "INSERT INTO prioritize(email, reg_number, student_id, scheduled_for_seminar) 
                VALUES('$email', '$reg_number', '$student_id', '$scheduled')";


    if(!mysqli_query($mysqli, $sql)) {
        echo ("Error Description: ".mysqli_error($mysqli));
    } else {
        header("Location: prioritize.php");
    }
}


if(isset($_POST['schedule-candidate'])) {
    $reg_number = $_POST['candidate-number'];
    $scheduled = 1;

    $sql = "UPDATE prioritize SET scheduled_for_seminar ='$scheduled' WHERE reg_number ='$reg_number'";


    if(!mysqli_query($mysqli, $sql)) {
        echo ("Error Description: ".mysqli_error($mysqli));
    } else {
        header("Location: scheduled.php");
    }
}
