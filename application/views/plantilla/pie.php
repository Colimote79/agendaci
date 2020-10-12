		</div> <!-- /.content -->
    </div> <!-- /.content-wrapper -->

	<!-- Main Footer -->
	<footer class="main-footer text-center" style="height: 80px; padding-top:0">
        <img class="divisor-tri" src="<?php echo IMG ?>divisor.png" alt="Divisor">
        <div><strong>&copy; <?php echo date("Y"); ?></strong> Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública</div>
        <div>Emilio Carranza esq. Ejército Nacional S/N, colonia Centro, C.P. 28000, Colima, Colima, México. Tel (312) 316-2603</div>
        <div><a href="http://www.secretariadoejecutivo.col.gob.mx" target="_blank">www.secretariadoejecutivo.col.gob.mx</a></div>
	</footer>

    <!-- DIV MODAL PARA CAMBIAR LA CONTRASEÑA -->
    <div class="modal fade" id="modalCambiarPassword" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header"> <!-- ENCABEZADO DEL PANEL -->
					<h5 class="modal-title">CAMBIAR CONTRASEÑA DE USUARIO <span class="text-danger"><strong><?php echo $GLOBALS['usuario']; ?></strong></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div> <!-- modal-header -->
                
                <div class="modal-body"> <!-- CONTENIDO DEL PANEL -->

					<p class="text-warning m-0">*La contraseña debe contener entre 6 y 20 caracteres.</p>
                    <p class="text-warning m-0 ">*La contraseña no debe ser igual al nombre de usuario.</p>
					<p class="text-warning m-0">*La contraseña no debe contener espacios en blanco.</p>
					<hr>

                    <form id="frmModalCambiarPassword">
                        
                        <input type="hidden" name="id_usuario" value="<?php echo $GLOBALS['idUsuario']; ?>">

                        <div class="form-group">
                            <label>Nueva contraseña</label>
                            <input type="password" id="txtPassNuevo" name="password" maxlength="20" pattern="[A-Za-z0-9.-_]{6,20}" class="form-control" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            <input type="password" id="txtPassConfirmar" maxlength="20" pattern="[A-Za-z0-9.-_]{6,20}" class="form-control" required autocomplete="off">
                        </div>

                    </form>

                </div> <!-- modal-body -->
                
                <div class="modal-footer"> <!-- PIE DEL PANEL -->
                    
                    <button type="submit" class="btn btn-success" form="frmModalCambiarPassword">
                        <i class="fas fa-save fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Guardar
                    </button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Cancelar
                    </button>

                </div> <!-- modal-footer -->

            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal para cambiar una contraseña -->

</div> <!-- /.wrapper --> 

<script type="text/javascript">
  
	let frmModalCambiarPassword = document.getElementById('frmModalCambiarPassword');

	frmModalCambiarPassword.addEventListener('submit', function(e) {
		e.preventDefault();

		if (validarContraseñas() == false) {
			alerta("Las contraseñas no coinciden.", 2);
			return false;
		}

		$.blockUI({ 
			message: '<img src="<?php echo IMG ?>espera.gif"/><h1>Actualizando credenciales</h1>',
			css: { width: '300px', top: ($(window).height() - 300) /2 + 'px', left: ($(window).width() - 300) /2 + 'px' }
		});

		let datos = new FormData(frmModalCambiarPassword);
		datos.append('aplicativo', <?php echo IDAPLICATIVO ?>);

		fetch( "http://10.20.4.54/seus/webservices/actualizarpassword", { method: 'POST', body: datos } )
		.then( res => res.json() )
		.then( data => {
		  
			$.unblockUI();

			$("#modalCambiarPassword").modal("hide");

			if (!data.error) { // NO HUBO ERROR EN LA CONSULTA
				alerta(data.mensaje, 1 );
			} else { // MENSAJE DE ADVERTENCIA EN LA CONSULTA
				alerta(data.mensaje, 2);
		  	}
		})
		.catch( error => {
			$.unblockUI();
			$("#modalCambiarPassword").modal("hide");
			alerta("Error al realizar la consulta: " + error, 3);
		});
	});

	function mostrarModalCambiarPassword() {
		frmModalCambiarPassword.reset();
		$("#modalCambiarPassword").modal("show");
	}

	$('#modalCambiarPassword').on('shown.bs.modal', function() {
		$('#txtPassNuevo').focus();
	});

	function validarContraseñas() {
		let OK = true;

		let pass1 = $("#txtPassNuevo").val();
		let pass2 = $("#txtPassConfirmar").val();

		if (pass1 !== pass2) {
			OK = false;
		}

		return OK;
	}

</script>

</body>
</html>