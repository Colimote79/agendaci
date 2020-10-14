<?php
    $GLOBALS['idUsuario']     = $this->session->userdata['logged_in']['idUsuario'];
    $GLOBALS['usuario']       = $this->session->userdata['logged_in']['usuario'];
    $GLOBALS['nombreUsuario'] = $this->session->userdata['logged_in']['nombreUsuario'];
    $GLOBALS['dependencia']   = $this->session->userdata['logged_in']['dependencia'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo NOMBREAPLICATIVO ?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo IMG ?>logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo CSS ?>fontawesome-5.15.1.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo CSS ?>bootstrap-4.5.2.min.css">
    <!-- Alertify -->
    <link rel="stylesheet" href="<?php echo CSS ?>alertify-1.13.1.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="<?php echo CSS ?>datatables-1.10.21.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?php echo CSS ?>adminlte-3.0.5.min.css">
    <!-- Hoja de estilos propia -->
    <link rel="stylesheet" href="<?php echo CSS ?>estilos.css">
    <!--
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    -->
    <!-- AREA DE SCRIPTS JS REQUERIDOS -->
    <!-- jQuery -->
    <script src="<?php echo JS ?>jquery-3.5.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo JS ?>bootstrap-4.5.2.min.js"></script>
    <!-- Alertify (Para agregar funcionalidad a los ALERT) -->
    <script src="<?php echo JS ?>alertify-1.13.1.min.js"></script>
    <script src="<?php echo JS ?>alertify.init.js"></script>
    <!-- blockUI (para bloqueo de pantalla) -->
    <script src="<?php echo JS ?>jquery.blockUI-2.70.0.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo JS ?>datatables-1.10.21.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?php echo JS ?>adminlte-3.0.5.min.js"></script>
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-secondary">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- ENLACES DERECHOS DEL NAVBAR -->
        <ul class="navbar-nav ml-auto">
            <!-- MENU NOTIFICACIONES -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notificationes</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
                    <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 peticiones de amistad
                    <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 nuevos reportes
                    <span class="float-right text-muted text-sm">2 días</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
                </div>
            </li>

            <!-- MENU USUARIO -->
            <li class="nav-item dropdown user user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo IMG ?>usuario-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="hidden-xs"><?php echo $GLOBALS['usuario'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-gray-dark color-palette">
                    <img src="<?php echo IMG ?>usuario-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                    <p>
                    <?php echo $GLOBALS['nombreUsuario'] ?>
                        <small><?php echo $GLOBALS['dependencia'] ?></small>
                    </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                    <button type="button" class="btn btn-default btn-flat btn-block" onclick="mostrarModalCambiarPassword();">
                        <i class="fas fa-lock"></i>&nbsp;&nbsp;Cambiar password
                    </button>
                    <button type="button" class="btn btn-default btn-flat btn-block" onclick="window.location='<?php echo URL ?>index.php/login/cerrarSesion';">
                        <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Cerrar sesión
                    </button>
                    </li>
                </ul>
            </li>

        </ul>
    </nav> <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-warning elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="<?php echo IMG ?>logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><b><?php echo NOMBREAPLICATIVO ?></b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item"><a id="liHome"  href="<?php echo URL ?>index.php/inicio" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Inicio</p></a></li>
                    <li class="nav-item"><a id="liNuevo" href="<?php echo URL ?>index.php/agenda/nuevo" class="nav-link"><i class="nav-icon fas fa-user-plus"></i><p>Nuevo</p></a></li>
                    <li class="nav-item"><a id="liConsulta" href="<?php echo URL ?>index.php/agenda/consulta" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Consulta</p></a></li>
                </ul>
            </nav> <!-- /.sidebar-menu -->
        </div> <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">