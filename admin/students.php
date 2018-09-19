<?php
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
    <link rel="stylesheet" href="<?php $_SERVER[DOCUMENT_ROOT] ?>/images/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="images/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!-- Theme style -->
    <link rel="stylesheet" href="images/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="images/admin/css/skins/skin-blue.css">
    <!-- Morris chart -->
    <!-- jvectormap -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="images/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="images/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


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
    <link href="images/admin/css/admin.css" rel="stylesheet">
    <link href="images/admin/css/dashboard.css" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
    <div class="wrapper">
        <?php include "$_SERVER[DOCUMENT_ROOT]/includes/admin/header.php";?>
        <?php include "$_SERVER[DOCUMENT_ROOT]/includes/admin/sidebar.php";?>
        <main>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1> Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="">Dashboard</li>
                        <li class="active">Employees</li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All Employees</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="col-md-offset-8 col-md-4 col-sm-7 col-xs-7 m-b-30">
                                    <div class="m-b-30">
                                        <a href="#">
                                            <button class="btn btn-primary pull-right">
                                                <i class="glyphicon glyphicon-plus-sign"></i> Bulk Upload Employee </button>
                                        </a>

                                        <a href="#">
                                            <button class="btn btn-primary pull-right">
                                                <i class="glyphicon glyphicon-plus-sign"></i> Create Employee </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTables" role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Profile Image</th>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">1</td>
                                                <td><img src="http://res.cloudinary.com/realcodeng/image/upload/c_fit,h_100,w_100/dfj4rnxavdmyemn5m7if.png" alt="User profile image"></td>
                                                <td>em</td>
                                                <td> Name </td>
                                                <td>

                                                </td>
                                                <td>
                                                    <button class="btn btn-success"> <span class="fa fa-edit"></span></button>
                                                    <button class="btn btn-danger">
                                                        <span class="fa fa-trash"></span>
                                                    </button>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <?php include "$_SERVER[DOCUMENT_ROOT]/includes/admin/footer.php";?>
    </div>
</div>


<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->
<script src="images/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="images/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="images/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="images/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>

<script src="images/admin/bower_components/moment/min/moment.min.js"></script>
<script src="images/admin/bower_components/ckeditor/ckeditor.js"></script>
<!-- datepicker -->
<script src="images/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="images/admin/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="images/admin/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="images/admin/js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function() {
        $('.dataTables').DataTable({})
    })
</script>
</body>
</html>
