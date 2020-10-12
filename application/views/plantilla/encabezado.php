<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo NOMBREAPLICATIVO ?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo IMG ?>logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo CSS ?>fontawesome-5.15.1.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo CSS ?>bootstrap-3.3.7.min.css">
    <!-- Alertify -->
    <link rel="stylesheet" href="<?php echo CSS ?>alertify-1.13.1.min.css">
    <!-- Estilos de DataTable -->
    <link rel="stylesheet" href="<?php echo CSS ?>dataTables-1.10.18.min.css">
    <!-- Estilos de la Plantilla AdminLTE v2.4.3-->
    <link rel="stylesheet" href="<?php echo CSS ?>adminlte-2.4.3.min.css">
    <link rel="stylesheet" href="<?php echo CSS ?>skin-gris.min.css">
    <!-- Hoja de estilos propia -->
    <link rel="stylesheet" href="<?php echo CSS ?>estilos.css">

    <!-- AREA DE SCRIPTS JS REQUERIDOS -->
    <!-- jQuery -->
    <script src="<?php echo JS ?>jquery-3.4.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo JS ?>bootstrap-3.3.7.min.js"></script>
    <!-- Alertify (Para agregar funcionalidad a los ALERT) -->
    <script src="<?php echo JS ?>alertify-1.13.1.min.js"></script>
    <script src="<?php echo JS ?>alertify.init.js"></script>
    <!-- blockUI (para bloqueo de pantalla) -->
    <script src="<?php echo JS ?>jquery.blockUI-2.70.0.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo JS ?>dataTables-1.10.18.min.js"></script>
    <!-- AdminLTE v2.4.3 -->
    <script src="<?php echo JS ?>adminlte-2.4.3.min.js"></script>

</head>

<!--
BODY TAG OPTIONS:
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-gris sidebar-mini">
<div class="wrapper">
  
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <img src="<?php echo IMG ?>logo.png" width=50 height=50 alt="Logo" class="logo-mini">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><?php echo NOMBREAPLICATIVO ?></b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            
            <b><a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a></b>
            
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo IMG ?>usuario-160x160.jpg" class="user-image" alt="Imagen de usuario">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">
                            <?php echo $_SESSION['nombre']; ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo IMG ?>usuario-160x160.jpg" class="img-circle" alt="Imagen de usuario">

                                <p>
                                    <?php echo $_SESSION['nombre']; ?>
                                    <small>
                                        <?php echo (!empty($_SESSION['dependencia'])) ? $_SESSION['dependencia'] : session_name(); ?>
                                    </small>
                                </p>

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <button type="button" class="btn btn-default btn-flat btn-block" onclick="mostrarModalCambiarPassword();">
                                    <i class="fas fa-lock"></i>&nbsp;&nbsp;Cambiar password
                                </button>
                                <button type="button" class="btn btn-default btn-flat btn-block" onclick="window.location='<?php echo URL ?>login/cerrarSesion.php';">
                                    <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Cerrar sesión
                                </button>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <?php require_once 'sidebarmenu.php'; ?>
            <!-- /.sidebar-menu -->
        </section>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- CONTENIDO PRINCIPAL -->
        <section class="content">
    