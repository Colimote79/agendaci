<div class="well well-sm">
	<h2><i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $title ?></h2>
</div>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h3 class="panel-title">DATOS DEL CONTACTO</h3>
	</div>

	<div class="panel-body">

		<form id="frmGenerales" name="frmGenerales" class="form-horizontal" action="insertarContacto.php">

			<div class="form-group form-group-sm">

				<label for="txtNombre" class="col-sm-2 col-md-1 control-label">Nombre(s)</label>
				<div class="col-sm-10 col-md-2">
   				<input type="text" class="form-control" id="txtNombre" name="nombre" placeholder="Nombre" minlength="3" maxlength="50" pattern="[a-zA-ZñÑ .\s]+" autofocus required>
   			</div>
				
				<label for="txtPaterno" class="col-sm-2 col-md-1 control-label">Apellido paterno</label>
				<div class="col-sm-10 col-md-2">
   				<input type="text" class="form-control" id="txtPaterno" name="paterno" placeholder="Paterno" minlength="3" maxlength="50" pattern="[a-zA-ZñÑ .\s]+" required>
   			</div>

   			<label for="txtMaterno" class="col-sm-2 col-md-1 control-label">Apellido materno</label>
   			<div class="col-sm-10 col-md-2">
   				<input type="text" class="form-control" id="txtMaterno" name="materno" placeholder="Materno" minlength="3" maxlength="50" pattern="[a-zA-ZñÑ .\s]+" required>
   			</div>
				
				<label for="txtFechaNacimiento" class="col-sm-2 col-md-1 control-label">Fecha nacimiento</label>
   			<div class="col-sm-10 col-md-2">
   				<input type="date" id="txtFechaNacimiento" name="fecha_nacimiento" class="form-control" min="1900-01-01">
   			</div>
				
			</div> <!-- form-group -->

   		<div class="form-group form-group-sm">

   			<label for="txtTelefono" class="col-sm-2 col-md-1 control-label">Teléfono</label>
				<div class="col-sm-10 col-md-2">
   				<input type="text" id="txtTelefono" name="telefono" class="form-control" maxlength="13" pattern="[0-9]{10,13}">
   			</div>

   			<label for="txtEmail" class="col-sm-2 col-md-1 control-label">Email</label>
				<div class="col-sm-10 col-md-2">
   				<input type="email" id="txtEmail" name="email" class="form-control" maxlength="100">
   			</div>
				
   			<label for="txtMunicipio" class="col-sm-2 col-md-1 control-label">Municipio</label>
				<div class="col-sm-10 col-md-2">
					<div class="input-group">
						<select class="form-control" id="txtMunicipio" name="id_municipio" required></select>
				    <span class="input-group-btn">
						  <button type="button" class="btn btn-primary btn-sm" onclick="$('#modalReportante').modal('show');"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
					  </span>
				  </div>
				</div>
   		</div> <!-- form-group -->

			<div class="form-group form-group-sm">

				<label for="txtDomicilio" class="col-sm-2 col-md-1 control-label">Domicilio</label>
				<div class="col-sm-10 col-md-11">
					<textarea class="form-control" id="txtDomicilio" name="domicilio" placeholder="Calle, número y colonia del domicilio"></textarea>
				</div>

			</div> <!-- form-group -->

		</form>

	</div> <!-- panel-body -->

	<div class="panel-footer">
		<!-- BOTONES DE ACCION -->
		<button type="submit" class="btn btn-success" form="frmGenerales">
			<i class="fas fa-save fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Guardar</strong>
		</button>
		<button type="button" class="btn btn-danger" onclick="window.location='index.php';">
			<i class="fas fa-times fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Cancelar</strong>
		</button>
	</div> <!-- panel-footer -->

</div> <!-- panel -->