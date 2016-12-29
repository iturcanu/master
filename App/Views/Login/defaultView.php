<!DOCTYPE html>
<html>
<?php if( is_readable("../App/Views/head.php")) {
    require_once "../App/Views/head.php";
}else{
    echo '../App/Views/head.php  not found';
}
?>
<body class="hold-transition login-page">
 <?php
            if(file_exists($file) && !is_dir($file)) {
                require_once $file;
            }
            ?>
<?php
if( is_readable("../App/Views/js.php")) {
    require_once "../App/Views/js.php";
}else{
    echo '../App/Views/js.php  not found';
}
?>
</body>
</html>