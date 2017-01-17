<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugins/iCheck/all.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<?php
if(isset($message)){
    echo $message;
}
?>
<form method="POST">
    <div class="form-group">
        <label>Denumirea</label>
        <input type="text" required class="form-control" name="item_name" value="<?=$item['name'] ?>">
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control select2" id="category" name="category" style="width: 100%;">
                        <option disabled selected value="<?=$item['category_id'] ?>"><?=$item['cat_name'] ?></option>
                        <option disabled>---------------</option>

                        <?php
                        foreach($categories as $key=>$category){
                            echo '<option style="text-transform: capitalize;" value='.$category["id"].'>'.$category["name"] .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <!-- /.form-group -->
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Introdu cantitatea <span id="quantity_units"> (<?=$item['si'] ?>)</span></label>
                    <input type="number" name="quantity" required class="form-control" value="<?=$item['quantity'] ?>" min="0">
                </div>
                <!-- /.form-group -->
            </div>
        </div>

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">
                    Introdu descrierea
                </h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
        <textarea id="editor1" name="description" rows="10" cols="80" style="visibility: hidden; display: none;"><?=$item['description'] ?>
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
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>

<script>
    $(document).ready(function() {
        $("#category").on("change",function(){
            var category_id = this.value;
            $.ajax({url: "Depozit/getCategoryUnit?category_id="+category_id, success: function(result){
                $('#quantity_units').html(' ('+result+')');
            }});
        });
    });
</script>