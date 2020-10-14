<div class="container-fluid pt-2">

	<div class="card">
		<div class="card-body">
			<h2><i class="fas fa-users"></i>&nbsp;&nbsp;<?php echo $title ?></h2>
		</div>
	</div>

	<div id="divTabla" class="table-responsive tabla">
		<table id="tabla" class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Correo electrónico</th>
					<th>Usuario</th>
					<th>Dependencia</th>
					<th>Área</th>
					<th>Estatus</th>
					<th>Acciones</th>
				</tr>
			</thead>
		</table>
	</div> <!-- tabla -->

</div> <!-- container-fluid -->

<script>

	//El DOM (controles) esta ya cargado. --> Inicializamos controles.
	$(document).ready(function () {	
	  $("#liConsulta").addClass("active");
	});

</script>