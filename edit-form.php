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

$form_id = '';
if (isset($_GET['id'])) {
    $form_id = $_GET['id'];
    $_SESSION['form_id'] = $form_id;
}

$student_form  = $mysqli->query("SELECT * FROM form WHERE id='$form_id'");
$form_rows = mysqli_num_rows($student_form);
$form = '';
if ($student_form->num_rows > 0) {
    $form = $student_form->fetch_assoc();
}
if (isset($_POST['update_form'])) {


    $first_name     = $_POST['first_name'];
    $middle_name     = $_POST['middle_name'];
    $last_name     = $_POST['last_name'];
    $registration_number   = $_POST['reg_number'];
    $loa   = $_POST['leave_absence'];
    $project_title  = $_POST['project_title'];
    $phone_no     = $_POST['phone_no'];
    $seminar_month    = $_POST['seminar_month'];
    $student_email = $_SESSION['student_email'];
    $hash = $_SESSION['form_hash'];
    $id = $_SESSION['form_id'];

    $sql = "UPDATE form SET first_name ='$first_name', middle_name = '$middle_name', last_name = '$last_name',
    reg_number = '$registration_number', leave_absence = '$loa', project_title = '$project_title', phone_no = '$phone_no',
    seminar_month = '$seminar_month' WHERE id ='$id'";


    if(!mysqli_query($con, $sql)) {

        echo ("Error Description: ".mysqli_error($con));

    } else {
        $_SESSION['form_edited'] = "Form edited successfully";
        echo "Form has been edited successfully by the supervisor";
//        die();
        header("location:http://".$_SERVER['SERVER_NAME']."/PG_Project_Update/supervisor.php?email=$student_email&hash=$hash");
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
                <input type="text" class="form-control" name="first_name" required placeholder="FirstName" value="<?php echo $form['first_name'] ?>">
            </div>

            <div class="form-group">
                <label>middle Name:</label>
                <input type="text" class="form-control" name="middle_name" placeholder="LastName" value="<?php echo $form['middle_name'] ?>">
            </div>

            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" class="form-control" name="last_name"  required placeholder="LastName" value="<?php echo $form['last_name'] ?>">
            </div>

            <div class="form-group">
                <label>Reg Number:</label>
                <input type="text" class="form-control" name="reg_number" value="<?php echo $form['reg_number'] ?>" autocomplete="off" placeholder="Regnumber">
            </div>

            <div class="form-group">
                <label>Leave Of Absence: ( No of semester )</label>
                <select class="form-control" name="leave_absence" required>
                    <option value="<?php echo $form['leave_absence'] ?>" selected><?php echo $form['leave_absence'] ?></option>
                </select>
            </div>

            <!--            <div class="form-group">-->
            <!--                <label>Submission Date:</label>-->
            <!--                <input type="datetime-local" class="form-control"  name="submission_date" required placeholder="submissiondate">-->
            <!--            </div>-->

            <div class="form-group">
                <label>Project Title:</label>
                <textarea class="form-control" name="project_title" required placeholder="Project Title"><?php echo $form['project_title'] ?></textarea>
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
                <input type="number" class="form-control"  name="phone_no" value="<?php echo $form['phone_no'] ?>" required placeholder="Phone Number">
            </div>

            <div class="form-group">
                <label>Proposed Seminar Month:</label>
                <select class="form-control" name="seminar_month" required>
                    <option value="<?php echo $form['seminar_month'] ?>" selected><?php echo $form['seminar_month'] ?></option>
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
                    <option value="<?php echo $form['supervisor_name'] ?>" selected><?php echo $form['supervisor_name'] ?></option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update Form" name="update_form"/>
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
