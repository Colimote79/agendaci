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
    <!-- Hoja de estilos propia -->
    <link rel="stylesheet" href="<?php echo CSS ?>estilos-login.css">
</head>

<body class="flex-centrado">
    <section id="login">
    
        <h1>INGRESA TUS DATOS</h1>
        
        <div id="imagen" class="text-center">
            <i class="fas fa-user-edit fa-3x"></i>
        </div>

        <form class="form-horizontal" id="frmLogin" method="post">
        
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" id="txtUsuario" name="usuario" class="form-control" maxlength="20" pattern="[A-Za-z0-9.-_]{4,20}" placeholder="Nombre de usuario" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fas fa-lock"></i></span>
                <input type="password" id="txtPassword" name="password" class="form-control" maxlength="20" pattern="[A-Za-z0-9.-_]{6,20}" placeholder="Contraseña" required>
            </div>
        </div>
        
        <div class="row">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Acceder</button>
        </div>

        </form>
      
    </section>
    
    <footer class="fixed-bottom">
        <img class="divisor-tri" src="<?php echo IMG ?>divisor.png" alt="Divisor">
        <div>
            <strong>&copy; <?php echo date("Y"); ?></strong> Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública
        </div>
        <div>
            Emilio Carranza esq. Ejército Nacional S/N, colonia Centro, C.P. 28000, Colima, Colima, México. Tel (312) 316-2603
        </div>
        <div>
            <a href="http://www.secretariadoejecutivo.col.gob.mx" target="_blank">www.secretariadoejecutivo.col.gob.mx</a>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo JS ?>jquery-3.4.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo JS ?>bootstrap-3.3.7.min.js"></script>
    <!-- Alertify -->
    <script src="<?php echo JS ?>alertify-1.13.1.min.js"></script>
    <script src="<?php echo JS ?>alertify.init.js"></script>
    <!-- blockUI (para bloqueo de pantalla) -->
    <script src="<?php echo JS ?>jquery.blockUI-2.70.0.min.js"></script>

    <script>

        let formulario = document.getElementById('frmLogin');

        $(document).ready(function() {
            
            $('#login').hide();

            setTimeout(function() {
            $('#login').fadeIn();
            document.getElementById("txtUsuario").focus();
            }, 200);

        });

        formulario.addEventListener('submit', function(e) {
            e.preventDefault();

            $.blockUI({ 
                message: '<img src="<?php echo IMG ?>espera.gif"/><h1>Validando credenciales</h1>',
                css: { width: '300px', top: ($(window).height() - 300) /2 + 'px', left: ($(window).width() - 300) /2 + 'px' }
            });

            let datos = new FormData(formulario);
            datos.append('aplicativo', <?php echo IDAPLICATIVO ?>);

            let url = "http://10.20.4.54/seus/webservices/iniciarsesion";

            fetch( url, { method: 'POST', body: datos } )
            .then( res => res.json() )
            .then( data => {
                $.unblockUI();

                if (!data.error) { // NO HUBO ERROR EN LA CONSULTA
                    iniciarSesion(data.datos);
                } else { // MENSAJE DE ADVERTENCIA EN LA CONSULTA
                    alerta(data.mensaje, 2);
                }
            })
            .catch( error => {
                $.unblockUI();
                alerta("Error al realizar la consulta: " + error, 3);
            });
        });

        function iniciarSesion(datos) {

            let url = "<?php echo base_url('index.php/login/iniciarSesion'); ?>";

            fetch( url, { method: 'POST', body: JSON.stringify(datos) } )
            .then( res => res.json() )
            .then( data => {
                if (!data.error) { // NO HUBO ERROR EN LA CONSULTA
                    alerta("Bienvenido(a) " + datos.nombre, 1, function() { window.location.href = "<?php echo base_url('index.php/inicio'); ?>"; } );
                } else { // MENSAJE DE ADVERTENCIA EN LA CONSULTA
                    alerta(data.mensaje, 2);
                }
            })
            .catch( error => alerta("Error al intentar iniciar variable SESSION: " + error, 3) );
        }

    </script>

</body>
</html>