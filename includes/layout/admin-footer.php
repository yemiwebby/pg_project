

<?php include "$_SERVER[DOCUMENT_ROOT]/includes/admin/footer.php";?>
</div>
</div>


<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo '/images/admin/bower_components/jquery-ui/jquery-ui.min.js'; ?>"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo '/images/admin/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>

<script src="<?php echo '/images/admin/bower_components/datatables.net/js/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo '/images/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.js'; ?>"></script>

<!-- datepicker -->
<script src="<?php echo '/images/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo '/images/admin/js/adminlte.min.js'; ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo '/images/admin/js/pages/dashboard.js'; ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo '/images/admin/js/demo.js'; ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function() {
        $('.dataTables').DataTable({})
    })
</script>
</body>
</html>
