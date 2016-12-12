<!DOCTYPE html>
<html>
<?php if( is_readable("../App/Views/head.php")) {
    require_once "../App/Views/head.php";
}else{
    echo '../App/Views/head.php  not found';
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php
    if( is_readable("../App/Views/header.php")) {
        require_once "../App/Views/header.php";
    }else{
        echo '../App/Views/header.php  not found';
    }

    if( is_readable("../App/Views/left_sidebar.php")) {
        require_once "../App/Views/left_sidebar.php";
    }else{
        echo '../App/Views/left_sidebar.php not found';
    }

    ?>


    <!-- Content Wrapper. Contains page content -->
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

            <?php
                if(file_exists($file) && !is_dir($file)) {
                   require_once $file;
                }
            ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    if( is_readable("../App/Views/footer.php")) {
        require_once "../App/Views/footer.php";
    }else{
        echo '../App/Views/footer.php  not found';
    }

    if( is_readable("../App/Views/control_sidebar.php")) {
        require_once "../App/Views/control_sidebar.php";
    }else{
        echo '../App/Views/control_sidebar.php  not found';
    }
    ?>
</div>
<!-- ./wrapper -->
<?php
if( is_readable("../App/Views/js.php")) {
    require_once "../App/Views/js.php";
}else{
    echo '../App/Views/js.php  not found';
}
?>
</body>
</html>