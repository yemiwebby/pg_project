<?php include('header.php');

require ('connect.php');

if (isset($_POST['login'])) {

// Escape email to protect against SQL injections
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");


    if ($result->num_rows == 0) { // User doesn't exist
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: login.php");
        die("User exist");
    } else { // User exists
        $user = $result->fetch_assoc();
        // verify password
        if (password_verify($_POST['password'], $user['password'])) {

            echo "Password verified";

            $_SESSION['reg_number'] = $user['reg_number'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['active'] = $user['active'];

            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;

            header("location: seminar_form.php");
        } else {
//            die("Not verified");
            $_SESSION['message'] = "You have entered wrong password, try again!";
            header("location: login.php");
        }
    }
}

?>


<div class="content-wrapper">
    <?php if (isset($_SESSION['message'])) { echo '<p>'.$_SESSION['message'].'</p>';} ?>
    <h3>Please Enter Your Details Here</h3>
    <div class="row">
        <form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="reg_number"> reg_number </label>
                    <input type="alphanumeric" class="form-control" name="reg_number" placeholder="Enter your reg_number" id="reg_number">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="email"> Email </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your Email address" id="email">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" id="password">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success" name="login">Login</button>
            </div>
        </form>
    </div>
</div>



<?php include('footer.php') ?>
