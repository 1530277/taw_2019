<?php
	$alumnos = MvcController::get_personas("alumnos");
?>
<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de alumnos registrados</h3>
            </div>
            <div class="box-body">
            	<table id="alumnos" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Nombres</th>
		                	<th>Apellido paterno</th>
		                	<th>Apellido materno</th>
		                	<th>Matrícula</th>
		                	<th>Teléfono</th>
		                	<th>Correo</th>
		                	<th>Acciones</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($alumnos as $alumno){?>
		                	<tr>
				                <td> <?php echo $alumno['nombres']; ?> </td>
				                <td> <?php echo $alumno['paterno']; ?> </td>
				                <td> <?php echo $alumno['materno']; ?> </td>
				                <td> <?php echo $alumno['matricula']; ?> </td>
				                <td> <?php echo $alumno['telefono']; ?> </td>
				                <td> <?php echo $alumno['correo']; ?> </td>
				                <td> 
				                	<a type="button" class="btn btn-warning" href="index.php?action=modificar_alumnos&id=<?php echo $alumno['id_persona']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
				                	<a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $alumno['id_persona']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
				                </td>
			                </tr>
			            <?php } ?>
	                </tbody>
	                <tfoot>
		                <tr>
		                	<th>Nombres</th>
		                	<th>Apellido paterno</th>
		                	<th>Apellido materno</th>
		                	<th>Matrícula</th>
		                	<th>Teléfono</th>
		                	<th>Correo</th>
		                	<th>Acciones</th>
		                </tr>
	                </tfoot>
            	</table>
        	</div>
        </div>
</div>

<script>

		function confirmar(id){
            var reply=confirm("¿Seguro que desea eliminar este registro?");
            if (reply==true){
                location.href="index.php?action=eliminar_registro&id="+id+"&tabla=alumnos";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#alumnos').DataTable()
			/*$('#example2').DataTable({
			  'paging'      : true,
			  'lengthChange': false,
			  'searching'   : false,
			  'ordering'    : true,
			  'info'        : true,
			  'autoWidth'   : false
			})*/
		})
</script>