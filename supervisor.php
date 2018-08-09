

<?php
//require ('header.php');

require ('connect.php');

if (isset($_POST['submit'])) {


//    // to store supervisors details on the database
//    $sql = "INSERT INTO Students (name, email) VALUES ('dr aina',  'abigailomlola1@gmail.com')";
//    if (mysqli_query($conn, $sql)) {
//        echo "New record created successfully";
//    } else {
//        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
//    }
//    mysqli_close($mysqli);


}

?>

<?php
/**
 * Created by PhpStorm.
 * User: Abigail
 * Date: 6/5/2018
 * Time: 2:35 PM
 */

session_start();
require ('connect.php');

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
    <form class="" method="post" enctype="" action="">

        <div class="form-group">
            <label>Proposed Seminar Month:</label>
            <select class="form-control">
                <option value="#" selected disabled>Select Month Option</option>

                <option value="month">January</option>
                <option value="month">February</option>
                <option value="month">March</option>
                <option value="month">April</option>
                <option value="month">May</option>
                <option value="month">June</option>
                <option value="month">July</option>
                <option value="month">August</option>
                <option value="month">September</option>
                <option value="month">October</option>
                <option value="month">November</option>
                <option value="month">December</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tick the box for Candidate Approval:&nbsp</label>
            <input type="radio" class="" name="seminar_type" value="Yes">YES&nbsp&nbsp
            <input type="radio" class="" name="seminar_type" value="No">NO
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="date" class="form-control"  name="date" required placeholder="date">
        </div>

        <div class="form-group">
            <label>Comment on candidate readiness:</label>
            <textarea class="form-control" name="text" placeholder="Comment"></textarea>
        </div>

<!--        <div class="form-group">-->
<!--            <label>Confirm The Candidate Leave Of Absence:&nbsp</label>-->
<!--            <input type="radio" class="" name="seminar_type" value="Yes">YES&nbsp&nbsp-->
<!--            <input type="radio" class="" name="seminar_type" value="No">NO-->
<!--        </div>-->

        <div class="form-group"><button type="submit" class="btn btn-success" name="submit">Submit</button></div>
    </form>
</div>



    <?php require ('footer.php');?>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

