<?php

include('header.php');

?>

<div class="content-wrapper">
    <p id="demo"></p>

    <?php
     if (isset($_SESSION['form_not_found'])) {
         echo $_SESSION['form_not_found'];
     }
    ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron text-center">
        <div class="title">
            <h3>DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING<br> OBAFEMI AWOLOWO UNIVERSITY, ILE-IFE, NIGERIA<br>
                POSTGRADUATE SEMINAR FORM</h3>
        </div>
    </div>


    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/Untitled-2.jpg" alt="oau-photo">
                <div class="carousel-caption">
                    <h2>Welcome to OAU</h2>
                    <h3>Computer Science and Engineering Department</h3>
                </div>
            </div>

            <div class="item">
                <img src="images/slide.png" alt="oau- photo" img="responsive">
                <div class="carousel-caption">
                    <h2>Welcome to OAU</h2>
                    <h3>Computer Science and Engineering Department</h3>
                </div>
            </div>

            <div class="item">
                <img src="images/untitled-2.jpg" alt="oau-photo">
                <div class="carousel-caption">
                    <h2>Welcome to OAU</h2>
                    <h3>Computer Science and Engineering Department</h3>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('footer.php') ?>
