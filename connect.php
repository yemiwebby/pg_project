<?php
$host ='localhost';
$username ='root';
$password ='';
$connect ='pg_project';
$mysqli =  new mysqli($host, $username, $password, $connect);
$con =  mysqli_connect($host, $username, $password, $connect);
//or die($mysqli->error);