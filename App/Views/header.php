<header class="main-header">
    <!-- Logo -->
    <a href="<?=$home ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Student</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php if(isset($_SESSION['avatar'])){echo $_SESSION['avatar']; };?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name']; };?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php if(isset($_SESSION['avatar'])){echo $_SESSION['avatar']; };?>" class="img-circle" alt="User Image">

                            <p>
                                <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name']; };?> - <?php if(isset($_SESSION['functie'])){echo $_SESSION['functie']; };?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="user/edit?id=<?=$_SESSION['userId'] ?>" class="btn btn-default btn-flat">Editează profilul</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->