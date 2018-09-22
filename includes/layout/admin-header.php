<?php
if(!isset($_SESSION))
{
    session_start();
}
include "$_SERVER[DOCUMENT_ROOT]/database/Database.php";
$database = new Database();
$user_table = $database->fetchAllStudent();
$forms_table = $database->fetchAllForms();
$forms_approved = $database->fetchAllApprovedForms();
$forms_un_approved = $database->fetchAllUnApprovedForms();


$student_rows = mysqli_num_rows($user_table);
$form_rows = mysqli_num_rows($forms_table);
$form_approved_count = mysqli_num_rows($forms_approved);
$form_un_approved_count = mysqli_num_rows($forms_un_approved);
//if ($user_table->num_rows > 0) {
//    while($user = $user_table->fetch_assoc()) {
//        echo '<pre>';
//        var_dump($user);
//        echo '</pre>';
//    }
//
//}
?>

    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600|Material+Icons" rel="stylesheet" type="text/css">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo '/images/admin/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>">
<!--        <link rel="stylesheet" href="images/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">-->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo '/images/admin/bower_components/font-awesome/css/font-awesome.min.css'; ?>">
        <!-- Ionicons -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo '/images/admin/css/AdminLTE.min.css'; ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo '/images/admin/css/skins/skin-blue.css'; ?>">
        <!-- Morris chart -->
        <!-- jvectormap -->
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo '/images/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo '/images/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'; ?>">


        <!-- Daterange picker -->


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- Styles -->
        <link href="<?php echo '/images/admin/css/admin.css'; ?>" rel="stylesheet">
        <link href="<?php echo '/images/admin/css/dashboard.css'; ?>" rel="stylesheet">
    </head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">
<?php include "$_SERVER[DOCUMENT_ROOT]/includes/admin/header.php";?>
<?php include "$_SERVER[DOCUMENT_ROOT]/includes/admin/sidebar.php";?>