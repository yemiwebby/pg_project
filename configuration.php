<?php include "$_SERVER[DOCUMENT_ROOT]/includes/layout/admin-header.php";?>
    <main>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="content-heading-title">
                    <h1> Set the current semester </h1>
                </div>

                <form action="#" method="post" style="background: #ffffff;padding: 25px;">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_semester"> Please enter the current semester <span>*</span></label>
                                    <input type="text" class="form-control" required id="current_semester" name="current_semester" placeholder="e.g  (TP/17/18/H/1234)">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"> <span class="fa fa-save"></span> Save </button>
                                </div>
                            </div>

                        </div>

                    </div>

<!--                    <div class="row">-->
<!--                        -->
<!--                    </div>-->
                </form>

            </section>
            <!-- /.content -->
        </div>
    </main>

<?php include "$_SERVER[DOCUMENT_ROOT]/includes/layout/admin-footer.php";?>