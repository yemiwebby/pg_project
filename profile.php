<?php
require ('connect.php');

if (isset($_POST['submit_form'])) {

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
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!--    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->
    <script src="js/my_js.js"></script>

</head>
<body>
<nav class="navbar navbar-info navbar-fixed-top">
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
                <li><a href="./">About Us</a></li>
                <li><a href="../navbar-fixed-top/">Contact Us</a></li>
                <li><a href="seminar_form.php"  class="btn btn-success"> <i class="glyphicon glyphicon-user"></i>Update</a></li>
                <li><a href="index.php" class=" btn btn-danger"> <i class="glyphicon glyphicon-user"></i>Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--body of the profile page display here-->
<div class="profile">
    <p id="message">you are all welcome</p>
    <div><img src="images/slide.png" class="img-responsive"></div>
</div>


<?php require ('footer.php');?>
