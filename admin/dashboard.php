<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
if (isset($_SESSION['level']) && $_SESSION['level'] == 'staff') {
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "logic.php"; ?>
<?php include "../config/connection.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - <?php echo $title; ?></title>
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="../dist/img/admin-logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<?php include "logic.php"; ?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../dist/img/admin-logo.png" alt="Admin" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIMPUS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php if (isset($_SESSION['staff_name'])) : ?>
                            <a href="#" class="d-block"><?php echo $_SESSION['staff_name']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="?module=dashboard" class="nav-link <?php if ($modules == "dashboard") echo 'active'; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if (in_array($modules, $data)) echo 'active'; ?>">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?module=book" class="nav-link <?php if (in_array($modules, $book)) echo 'active'; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Library Book Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?module=staff" class="nav-link <?php if ($modules == "staff") echo 'active'; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Library Staff Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?module=member" class="nav-link <?php if ($modules == "member") echo 'active'; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Library Member Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?module=taker" class="nav-link <?php if ($modules == "taker") echo 'active'; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Taker Book Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?module=return" class="nav-link <?php if ($modules == "return") echo 'active'; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Return Book Data</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?module=report" class="nav-link <?php if ($modules == "report") echo 'active'; ?>">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Report
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?module=user" class="nav-link <?php if ($modules == "user") echo 'active'; ?>">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-right-from-bracket" style="color: red;"></i>
                                <p style="color: red; font-weight:bold;">
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- /.content-header -->
            <!-- Main content -->
            <?php include "data.php"; ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong><a href="#">Made with Happines </a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- Font Awesome Kit-->
    <script src="https://kit.fontawesome.com/dbc8973e7a.js" crossorigin="anonymous"></script>
    <!-- Script Limit Show Data Table -->
    <script>
        function updateTable() {
            var limit = parseInt(document.getElementById("limit").value, 10);
            var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');

            // Sembunyikan semua baris terlebih dahulu
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = "none";
            }

            // Menampilkan semua data jika "Semua" dipilih
            if (limit === 0) {
                for (var i = 0; i < rows.length; i++) {
                    rows[i].style.display = "table-row";
                }
            } else {
                // Tampilkan baris sesuai dengan limit
                for (var i = 0; i < limit && i < rows.length; i++) {
                    rows[i].style.display = "table-row";
                }
            }
        }
    </script>
</body>

</html>