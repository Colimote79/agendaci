<div class="container-fluid pt-2">

	<div class="card">
		<div class="card-body">
			<h2><i class="fas fa-user-plus mr-2"></i><?php echo $title ?></h2>
		</div>
	</div>

	<div class="card">

		<div class="card-body">

			<form id="frmGenerales" name="frmGenerales" action="insertarContacto.php">

				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="txtNombre">Nombre(s)</label>
						<input type="text" class="form-control" id="txtNombre" name="nombre" placeholder="Nombre" minlength="3" maxlength="50" pattern="[a-zA-ZñÑ .\s]+" autofocus required>
					</div>

					<div class="form-group col-md-4">
						<label for="txtPaterno">Apellido paterno</label>
						<input type="text" class="form-control" id="txtPaterno" name="paterno" placeholder="Paterno" minlength="3" maxlength="50" pattern="[a-zA-ZñÑ .\s]+" required>
					</div>

					<div class="form-group col-md-4">
						<label for="txtMaterno">Apellido materno</label>
						<input type="text" class="form-control" id="txtMaterno" name="materno" placeholder="Materno" minlength="3" maxlength="50" pattern="[a-zA-ZñÑ .\s]+" required>
					</div>
				</div> <!-- form-row -->

				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="txtFechaNacimiento">Fecha nacimiento</label>
						<input type="date" id="txtFechaNacimiento" name="fecha_nacimiento" class="form-control" min="1900-01-01">
					</div>
					
					<div class="form-group col-md-2">
						<label for="txtTelefono">Teléfono</label>
						<input type="text" id="txtTelefono" name="telefono" class="form-control" placeholder="Teléfono" maxlength="13" pattern="[0-9]{10,13}">
					</div>				
					<div class="form-group col-md-4">
						<label for="txtEmail">Email</label>

						<input type="email" id="txtEmail" name="email" class="form-control" placeholder="Correo electrónico" maxlength="100">
					</div>
					<div class="form-group col-md-4">
						<label for="txtMunicipio">Municipio</label>
						<div class="input-group mb-3">
							<select class="form-control" id="txtMunicipio" name="id_municipio" required></select>
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2"><i class="fas fa-plus"></i></span>
							</div>
						</div>
					</div>
				</div> <!-- form-row -->

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="txtDomicilio">Domicilio</label>
						<textarea class="form-control" id="txtDomicilio" name="domicilio" placeholder="Calle, número y colonia del domicilio"></textarea>
					</div>
				</div> <!-- form-row -->

			</form>

		</div> <!-- card-body -->

		<div class="card-footer">
			<!-- BOTONES DE ACCION -->
			<button type="submit" class="btn btn-success" form="frmGenerales">
				<i class="fas fa-save fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Guardar</strong>
			</button>
			<button type="button" class="btn btn-danger" onclick="window.location='index.php';">
				<i class="fas fa-times fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Cancelar</strong>
			</button>
		</div> <!-- card-footer -->

	</div> <!-- card -->

</div> <!-- container-fluid -->
