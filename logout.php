<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 01/08/2018
 * Time: 5:49 AM
 */

session_start();
session_unset();
session_destroy();

header("location:index.php");

exit();