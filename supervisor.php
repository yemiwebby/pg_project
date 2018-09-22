

<?php
session_start();
require ('connect.php');

if (isset($_GET['hash'])) {
    $form_hash = $_GET['hash'];
    $_SESSION['student_email'] = $_GET['email'];
    $_SESSION['form_hash'] = $_GET['hash'];
    $sql = $mysqli->query("SELECT * FROM form WHERE hash='$form_hash'");

    $form_id = '';
    $num_rows = mysqli_num_rows($sql);
    if ($sql->num_rows > 0) {
        $form = $sql->fetch_assoc();
        $form_id = $form['id'];
        $_SESSION['form_id'] = $form_id;
//       echo "Form found";
    } else {
        $_SESSION['form_not_found'] = "Form not valid";
        header("location:index.php");
    }
}

$edit_form_link = "http://".$_SERVER['SERVER_NAME']."/PG_Project_Update/edit-form.php?id=$form_id";

if (isset($_POST['submit_approval'])) {


    $proposed_seminar_month = $_POST['proposed_seminar_month'];
    $approved = $_POST['approved'];
    $seminar_date = $_POST['seminar_date'];
    $comments = $_POST['comments'];
    $id = $_SESSION['form_id'];

    $sql = "UPDATE form SET proposed_seminar_month ='$proposed_seminar_month', approved = '$approved', 
    seminar_date = '$seminar_date', comments = '$comments' WHERE id ='$id'";


    if(!mysqli_query($con, $sql)) {

        echo ("Error Description: ".mysqli_error($con));

    } else {
        session_destroy();
        header("location:http://".$_SERVER['SERVER_NAME']."/PG_Project_Update/thanks-sup.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PG SERMINAR PORTAL</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo '/images/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'; ?>">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->
    <script src="js/my_js.js"></script>

</head>
<body>
<nav class="navbar navbar-info">
    <div class="container">
        <div class="navbar-header">
            <div id="logo">
                <a href="index.php">
                    <img src="images/untitled-2-6.png" class="img-responsive">
                </a>
            </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="index.php">About Us</a></li>
                <li><a href="index.php">Contact Us</a></li>

                <?php
//                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

//                    $user = $_SESSION['supervisor_name'];
                    echo ('<li><a href="#"  class="btn btn-default"> <i class="glyphicon glyphicon-user"></i> Welcome </a></li>');
//                    echo ('<li><a href="seminar_form.php"  class="btn btn-default"> <i class="glyphicon glyphicon-user"></i> Form </a></li>');
                    echo ('<li><a href="logout.php"  class="btn btn-default"> <i class="glyphicon glyphicon-user"></i> Logout </a></li>');

//                } else{
//                    ?>
<!--                    <li><a href="register.php"  class="btn btn-danger"> <i class="glyphicon glyphicon-user"></i>Sign Up</a></li>-->
<!--                    <li><a href="login.php" class=" btn btn-success"> <i class="glyphicon glyphicon-user"></i>Log In</a></li>-->
<!--                    --><?php
//                }
                ?>

            </ul>
        </div>
    </div>
</nav>



<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron text-center">
    <div class="container">
        <h3>DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING<br> OBAFEMI AWOLOWO UNIVERSITY, ILE-IFE, NIGERIA<br>
            POSTGRADUATE SEMINAR FORM</h3>
    </div>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <div class="container">
        <p> PLEASE FILL IN THE CONFIRMATION FORM BELOW.<span class="fa fa-2x fa-pencil"></span></div></p>
    <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

        <div class="form-group">
            <label>Proposed Seminar Month:</label>
            <select class="form-control" name="proposed_seminar_month">
                <option value="#" selected disabled>Select Month Option</option>

                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tick the box for Candidate Approval:&nbsp</label>
            <input type="radio" class="" name="approved" value="1"> YES&nbsp&nbsp
            <input type="radio" class="" name="approved" value="0"> NO
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="text" class="form-control"  name="seminar_date" id="seminar_date" required>
        </div>

        <div class="form-group">
            <label>Comment on candidate readiness:</label>
            <textarea class="form-control" name="comments" placeholder="Comment"></textarea>
        </div>

<!--        <div class="form-group">-->
<!--            <label>Confirm The Candidate Leave Of Absence:&nbsp</label>-->
<!--            <input type="radio" class="" name="seminar_type" value="Yes">YES&nbsp&nbsp-->
<!--            <input type="radio" class="" name="seminar_type" value="No">NO-->
<!--        </div>-->

        <div class="form-group">
            <button type="submit" class="btn btn-success" name="submit_approval">Submit</button>
            <a href="<?php echo $edit_form_link ?>" target="_blank">
            <button type="button" class="btn btn-success">
                Edit Form
            </button>
            </a>
        </div>
    </form>
</div>



    <?php require ('footer.php');?>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="<?php echo '/images/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'; ?>"></script>
<script>
    $('#seminar_date').datepicker({
        autoclose: true,
        closeOnDateSelect: true
    });
</script>
</body>
</html>

