<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 17/09/2018
 * Time: 5:48 AM
 */

?>

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