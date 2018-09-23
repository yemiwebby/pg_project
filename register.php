<?php 
include('header.php');

//session_start();
require ('connect.php');

if(isset($_POST['register'])) {
    $registration_number = $_POST['reg_number'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Escape all $_POST variables to protect against SQL injections
    $first_name = $mysqli->escape_string($_POST['reg_number']);
    $last_name = $mysqli->escape_string($_POST['username']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );

    // Validate input fields that check if te user with the input field exists
    $result = $mysqli->query("SELECT * FROM users WHERE reg_number='$registration_number' OR email='$email' OR username='$username'");
    $num_rows = mysqli_num_rows($result);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['reg_number'] === $registration_number) {
            $_SESSION['message'] = "User with this registration number already exists!";
        } else if ($user['email'] === $email) {
            $_SESSION['message'] = "User with this email address already exists!";
        } else if ($user['username'] === $registration_number){
            $_SESSION['message'] = "Username already exist, please choose another username!";
        }
    }
    else{
        // generate student's ID
        $studentId = "OAU".mt_rand(5,10000);
//        $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
        // insert into the database
        $sql = "INSERT INTO users(reg_number, username, email, password, student_id) VALUES('$registration_number', '$username', '$email', '$password', '$studentId')";

        $_SESSION['active'] = 1;
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['reg_number'] = $registration_number;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        if(!mysqli_query($mysqli, $sql)) {
            echo ("Error Description: ".mysqli_error($mysqli));
        } else {
            $_SESSION['message'] = "registration was successful";
            header("register.php");
            header("Location: seminar_form.php");
        }
    }

}
?>

<?php //if (isset($_SESSION['message'])) { echo $_SESSION['message']; } ?>
<div class="content-wrapper">
    <?php if (isset($_SESSION['message'])) { echo '<p>'.$_SESSION['message'].'</p>';} ?>
    <h3>Fill in your details</h3>
    <div class="row">
        <form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="reg_number">Registration Number</label>
                    <input type="text" class="form-control" name="reg_number" placeholder="Enter your registration number" id="reg_number">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username" id="username">
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
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your passsword" id="password">
                </div>
            </div>

            <div class="form-group">
                <div><button type="submit" class="btn btn-success form-group" name="register">Register</button></div>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php') ?>
