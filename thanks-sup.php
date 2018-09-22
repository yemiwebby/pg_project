

<?php
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

<div>
    <p>
       Thanks for submitting your comments
    </p>
</div>



<?php require ('footer.php');?>
</body>
</html>

