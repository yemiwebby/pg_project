<?php include "$_SERVER[DOCUMENT_ROOT]/includes/layout/admin-header.php";?>
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
                    <h3 class="box-title">Prioritized List </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">

                        <div class="col-md-offset-8 col-md-4 col-sm-7 col-xs-7 m-b-30">
                            <div class="m-b-30">
                                <a href="candidates.php">
<!--                                    <button class="btn btn-primary pull-right"> Manage Candidates </button>-->
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTables" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Registration Number</th>
                                        <th>Student Id</th>
                                        <th>Scheduled</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    if ($prioritized_table->num_rows > 0) {
                                        while($user = $prioritized_table->fetch_assoc()) {
                                            $status = '';
                                            if (($user['scheduled_for_seminar'] == 0) || ($user['scheduled_for_seminar'] == null)) {
                                                $status = "No";
                                            } else {
                                                $status = "Yes";
                                            }
                                            echo (
                                                '<tr role="row" class="odd">'.
                                                '<td class="sorting_1"></td>'.
                                                '<td>'.$user['email'].'</td>'.
                                                '<td>'.$user['reg_number'].'</td>'.
                                                '<td>'.$user['student_id'].'</td>'.
                                                '<td>'.$status.'</td>'.
                                                '<td>
<form method="post" action="add.php">
<input type="hidden" name="candidate-number" value="'.$user['reg_number'].'">
   <button class="btn btn-success" type="submit" name="schedule-candidate"><span class="fa fa-edit"></span>Schedule Now</button>
</form>
                                                      
                                                                                                          
                                                        </td>'.
                                                '</tr>'
                                            );
                                        }
                                    }
                                    ?>

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

<?php include "$_SERVER[DOCUMENT_ROOT]/includes/layout/admin-footer.php";?>