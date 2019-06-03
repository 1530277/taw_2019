<?php
	$materias = MvcController::get_materias();
?>

<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de materias registradas</h3>
            </div>
            <div class="box-body">
            	<table id="materias" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Clave</th>
		                	<th>Nombre materia</th>
		                	<th>Carrera</th>
		                	<th>Número de empleado</th>
		                	<th>Profesor que la imparte</th>
		                	<th>Acciones</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($materias as $materia){?>
		                	<tr>
				                <td> <?php echo $materia['clave']; ?> </td>
				                <td> <?php echo $materia['nombre_materia']; ?> </td>
				                <td> <?php echo $materia['nombre_carrera']; ?> </td>
				                <td> <?php echo $materia['numero_empleado']; ?> </td>
				        		<td> <?php echo $materia['nombres']." ".$materia['paterno']." ".$materia['materno']; ?> </td>
				                <td> 
				                	<a type="button" class="btn btn-warning" href="index.php?action=modificar_materias&id=<?php echo $materia['id_materia']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
				                	<a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $materia['id_materia']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
				                </td>
			                </tr>
			            <?php } ?>
	                </tbody>
	                <tfoot>
		                <tr>
		                	<th>Clave</th>
		                	<th>Nombre materia</th>
		                	<th>Carrera</th>
		                	<th>Número de empleado</th>
		                	<th>Profesor que la imparte</th>
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
                location.href="index.php?action=eliminar_registro&id="+id+"&tabla=materias";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#materias').DataTable()
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