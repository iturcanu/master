<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugins/iCheck/all.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<form method="POST">
    <div class="form-group">
        <label>Text</label>
        <input type="text" class="form-control" name="task_title" value="<?= $task['name'] ?>">
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2" name="assigned_to" style="width: 100%;">
                        <?php
                            if(isset($task['id'])){
                                echo '<option value='.$task["userId"].'>'.$task["username"] .'</option>';
                            }
                            foreach($users as $key=>$user){
                                echo '<option value='.$user["id"].'>'.$user["name"] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <!-- /.form-group -->
            </div>

            <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="task_deadline" class="form-control pull-right" id="datepicker" value="<?php if(isset($task['deadline'])){ echo $task['deadline'];} ?>">
                </div>
                <!-- /.input group -->
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">CK Editor
                        <small>Advanced and full of features</small>
                    </h3>
                </div>
                <div class="box-body pad">
        <textarea id="editor1" name="task_description" rows="10" cols="80" style="visibility: hidden; display: none;"><?= $task['description'] ?>
        </textarea>
                </div>
            </div>
            <input type="submit">
</form>


<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(function () {


        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
    });
</script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>