<?php
/**
 * Created by PhpStorm.
 * User: Abigail
 * Date: 7/11/2018
 * Time: 10:50 PM
 */
?>


<?php
include ('header.php');

include('./utility/Services.php');

//session_start();
require ('connect.php');

// Redirect if not logged in

if (!isset($_SESSION['username']) && !isset($_SESSION['logged_in'])) {
    header('Location: index.php');
}

// fetch supervisor's details from database for the form
$supervisors_table  = $mysqli->query("SELECT * FROM supervisors");

// get reg number from the session
$registration_number = '';
if(isset($_SESSION['reg_number'])) {
    $registration_number = $_SESSION['reg_number'];
}

$student_id = '';

$student  = $mysqli->query("SELECT * FROM users WHERE reg_number='$registration_number'");
$num_rows = mysqli_num_rows($student);
if ($student->num_rows > 0) {
    $sup = $student->fetch_assoc();
    $student_id = $sup['student_id'];
}

if (isset($_POST['submit_form'])) {

    $supervisor_name = $_POST['supervisor_name'];
    $supervisor_email = '';


    // fetch supervisor's email only
    $supervisor  = $mysqli->query("SELECT * FROM supervisors WHERE supervisor_name='$supervisor_name'");
    $num_rows = mysqli_num_rows($supervisor);
    if ($supervisor->num_rows > 0) {
        $sup = $supervisor->fetch_assoc();
        $supervisor_email = $sup['supervisor_email'];
    }


    $first_name     = $_POST['first_name'];
    $middle_name     = $_POST['middle_name'];
    $last_name     = $_POST['last_name'];
    $registration_number   = $_POST['reg_number'];
    $regno   = $_POST['regno'];
    $loa   = $_POST['leave_absence'];
    $project_title  = $_POST['project_title'];
    $seminar_type    = isset($_POST['seminar_type']) ? $_POST['seminar_type'] : '';
    $dos     = $_POST['degree_study'];
    $phone_no     = $_POST['phone_no'];
    $seminar_month    = $_POST['seminar_month'];
    $student_email = $_SESSION['email'];

    // Check input
    if (empty($first_name)) {
        echo "First name is require";
    }

    if (empty($last_name)) {
        echo "Last name is require";
    }

    if(empty($loa)) {
        echo "Leave of absence is required";
    }

    if(empty($project_title)) {
        echo "Project is required";
    }

    if(empty($dos)){
        echo "degree of study is required";
    }

    if(empty($phone_no)) {
        echo "Phone number is required";
    }

    if(empty($seminar_month)) {
        echo "Seminar month is required";
    }

    if(empty($supervisor_name)) {
        echo "Supervisor's name is required";
    }
    if(empty($regno)) {
        echo "Registration Number is required";
    }

    $target_dir = "necessaryDocuments/"; //directory to save the document
    $file = $_FILES['file']['name'];
    $target_file = $target_dir.basename($file);
    $documentType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($file) {
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$file)){
            echo "Your file ".basename($file)."was successfully uploaded";
        }
    }




//    $register = $mysqli->query("SELECT * FROM users WHERE reg_number='$registration_number'");
//    $num_rows = mysqli_num_rows($register);
//
//    if ($register->num_rows > 0) {
//        $sup = $register->fetch_assoc();
//        $registration_number = $sup['reg-number'];
//    }

    //  TO HASH THE PASSWORD CODE GOES HERE
    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
    //$result = $mysqli->query("SELECT * FROM form WHERE reg_number='$registration_number'");
    $result = mysqli_query($con,"SELECT * FROM form WHERE reg_number='$regno'");
    $num_rows = mysqli_num_rows($result);

    //echo $num_rows." ".$registration_number;

    //if ($result->num_rows > 0) {
    if ($num_rows > 0) {

        echo "User with this registration number already exists!".mysqli_error($con);

        die("User exist".mysqli_error($con));

    } else {

        // else proceed with the registration
        $sql = "INSERT INTO form(first_name, middle_name, last_name, reg_number, leave_absence, project_title, seminar_type, degree_study, document, phone_no, seminar_month, supervisor_name, hash)
 VALUES ('$first_name','$middle_name', '$last_name', '$regno', '$loa', '$project_title', '$seminar_type', '$dos', '$file', '$phone_no', '$seminar_month', '$supervisor_name', '$hash')";


        if(!mysqli_query($con, $sql)) {

            echo ("Error Description: ".mysqli_error($con));

        } else {

            $_SESSION['active'] = 0;  // 0 untill supervisor approve the serminar form

            $link = "http://".$_SERVER['SERVER_NAME']."/PG_Project_Update/supervisor.php?email=$student_email&hash=$hash";

            $message_student = "<p>Hello  <b>$first_name</b></p><p>Thank you for filling the form!<br> 
            A confirmation link has been sent to <b>$supervisor_name</b>. <br> Do ensure to check your 
            email $student_email as a mail will be sent to you once your form has been approved!</p>";


            $message_supervisor = "<p>Hello <b>$supervisor_name</b>, <br> This is to notify you
     that <b>$first_name $last_name</b> with the registration number of <b>$regno</b> just submitted the seminar form on the topic: <br>$project_title</br><br><br>
       Kindly click the link below to approve it. <br><br>$link;
     </p>";

             $message = "<p>Hello, <b>Dr Segun Aina</b>, <br> This is to notify you
      that <b>$first_name $last_name</b> with the registration number of <b>$regno</b> just submitted the seminar form on the topic: <br>$project_title</br><br><br>
        and supervisor's name is $supervisor_name.
      </p>";

            // Send emails

            $service = new Services();
            $service->sendEmailToStudent($student_email, $message_student);
            $service->sendEmailToSupervisor($supervisor_email, $message_supervisor);
            $service->sendEmailToAdmin($message);

            // calculate and save semester
            $semester = $service->finalSemesterUsingLeaveOfAbsence($regno, $loa);

            // Add to priority list
            if ($semester > 4) {
                //
            }
            $database = new Database();
            $database->updateStudentSemester($semester, $regno);

            echo  $message_student;
        }

    }


}

?>


<div class="content-wrapper">
    <div class="seminar_form">
        <div><h3><?php echo @$student_id?></h3></div>
        <div class="form">
            <p>SEMINAR FORM<span class="fa fa-2x fa-pencil"></span></div></p>
        <form class="" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <input type="hidden" name="regno" value="<?php echo $registration_number; ?>" />
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" class="form-control" name="first_name" required placeholder="FirstName">
            </div>

            <div class="form-group">
                <label>middle Name:</label>
                <input type="text" class="form-control" name="middle_name" placeholder="LastName">
            </div>

            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" class="form-control" name="last_name"  required placeholder="LastName">
            </div>

            <div class="form-group">
                <label>Reg Number:</label>
                <input type="text" class="form-control" name="reg_number" value="<?php echo "$registration_number" ?>" autocomplete="off" placeholder="Regnumber">
            </div>

            <div class="form-group">
                <label>Leave Of Absence: ( No of semester )</label>
                <select class="form-control" name="leave_absence" required>
                    <option value="#" selected disabled>Select one Option</option>
                    <option value="none">None</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <!--            <div class="form-group">-->
            <!--                <label>Submission Date:</label>-->
            <!--                <input type="datetime-local" class="form-control"  name="submission_date" required placeholder="submissiondate">-->
            <!--            </div>-->

            <div class="form-group">
                <label>Project Title:</label>
                <textarea class="form-control" name="project_title" required placeholder="Project Title"></textarea>
            </div>

            <div class="form-group">
                <label>Degree of Study:&nbsp&nbsp</label>
                <input type="radio" class="degree_of_study" onclick="pgdClicked()" id="pgd" name="degree_study" value="PGD">PGD &nbsp&nbsp
                <input type="radio" class="degree_of_study" onclick="mscClicked()" id="msc" name="degree_study" value="MSc">MSc &nbsp&nbsp
                <input type="radio" class="degree_of_study" onclick="mphilClicked()" id="mphil" name="degree_study" value="M Phil">M Phil &nbsp&nbsp
                <input type="radio" class="degree_of_study" onclick="phdClicked()" id="phd" name="degree_study" value="PHD">PHD
            </div>


            <div class="form-group" id="seminar_type">
                <label>Seminar Type:&nbsp&nbsp</label>
                <input type="radio" class="seminar_type" onclick="conceptClicked()" id="concept" name="seminar_type" value="Concept">Concept &nbsp&nbsp
                <input type="radio" onclick="progressClicked()" class="seminar_type" id="progress" name="seminar_type" value="Progress">Progress &nbsp&nbsp
                <input type="radio" onclick="publicLectureClicked()" class="seminar_type" id="publicLecture" name="seminar_type" value="Public Lecture">Public Lecture &nbsp
            </div>

            <div style="display: none" id="file" class="form-group">
                <label>Upload necessary document</label>
                <input  type="file"  name="file">
            </div>

            <div class="form-group">
                <label>Candidate's Telephone Number:</label>
                <input type="number" class="form-control"  name="phone_no" required placeholder="Phone Number">
            </div>

            <div class="form-group">
                <label>Proposed Seminar Month:</label>
                <select class="form-control" name="seminar_month" required>
                    <option value="#" selected disabled>Select Month Option</option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                </select>
            </div>

            <div class="form-group">
                <label>Supervisor's Name:</label>
                <select class="form-control" name="supervisor_name" required>
                    <option value="#" selected disabled>Select Supervisor's Name</option>

                    <?php
                    $num_rows = mysqli_num_rows($supervisors_table);
                    if ($supervisors_table->num_rows > 0) {
                        while($supervisor = $supervisors_table->fetch_assoc()) {
                            echo('<option value="'.$supervisor['supervisor_name'].'">'.$supervisor['supervisor_name'].'</option>');
                        }

                    }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Submit" name="submit_form"/>
            </div>
        </form>
    </div>
</div>

<script>
    function pgdClicked() {
        var pgd = document.getElementById("pgd");
        var seminar_type = document.getElementById("seminar_type");

        if(pgd.checked === true){
            seminar_type.style.display = "none";
        } else{
            seminar_type.style.display = "block";

        }

    }

    function mscClicked() {
        var msc = document.getElementById("msc");
        var seminar_type = document.getElementById("seminar_type");

        if(msc.checked === true){
            seminar_type.style.display = "block";
        }
    }

    function mphilClicked() {
        var mphil = document.getElementById("mphil");
        var seminar_type = document.getElementById("seminar_type");

        if(mphil.checked === true){
            seminar_type.style.display = "block";
        }

    }

    function phdClicked() {
        var phd = document.getElementById("phd");
        var seminar_type = document.getElementById("seminar_type");

        if(phd.checked === true){
            seminar_type.style.display = "block";
        }

    }

    function check_degree_seminar_type(){
        seminar_type = $(".seminar_type[name='seminar_type']").id;
        degree_of_study = $(".degree_of_study[name='degree_of_study']");
        console.log(degree_of_study);
    }

    check_degree_seminar_type();
    // $(document).ready(function(){

    //     $('.degree_of_study').click(check_degree_seminar_type());
    //     $('.seminar_type').change(check_degree_seminar_type());

    // });



    function progressClicked() {
        //get the progress radio button
        var progress = document.getElementById("progress");
        // get the file input element
        var uploadFile = document.getElementById("file");

        if(progress.checked === true) {
            uploadFile.style.display = "block";
        } else {
            uploadFile.style.display = "none";
        }
    }

    function conceptClicked() {
        var concept = document.getElementById("concept");
        var uploadFile = document.getElementById("file");

        if(concept.checked === true){
            uploadFile.style.display = "none";
        }

    }

    function publicLectureClicked() {
        var publicLecture = document.getElementById("publicLecture");
        var uploadFile = document.getElementById("file");

        if(publicLecture.checked === true) {
            uploadFile.style.display = "none";
        }
    }

</script>


<?php require ('footer.php');?>
