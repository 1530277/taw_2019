<?php
	$maestros = MvcController::get_personas("maestros");
?>
<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de maestros registrados</h3>
            </div>
            <div class="box-body">
            	<table id="maestros" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Nombres</th>
		                	<th>Apellido paterno</th>
		                	<th>Apellido materno</th>
		                	<th>Número de empleado</th>
		                	<th>Teléfono</th>
		                	<th>Correo</th>
		                	<th>Acciones</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($maestros as $maestro){?>
		                	<tr>
				                <td> <?php echo $maestro['nombres']; ?> </td>
				                <td> <?php echo $maestro['paterno']; ?> </td>
				                <td> <?php echo $maestro['materno']; ?> </td>
				                <td> <?php echo $maestro['numero_empleado']; ?> </td>
				                <td> <?php echo $maestro['telefono']; ?> </td>
				                <td> <?php echo $maestro['correo']; ?> </td>
				                <td> 
				                	<a type="button" class="btn btn-warning" href="index.php?action=modificar_maestros&id=<?php echo $maestro['id_persona']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
				                	<a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $maestro['id_persona']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
				                </td>
			                </tr>
			            <?php } ?>
	                </tbody>
	                <tfoot>
		                <tr>
		                	<th>Nombres</th>
		                	<th>Apellido paterno</th>
		                	<th>Apellido materno</th>
		                	<th>Número de empleado</th>
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
                location.href="index.php?action=eliminar_registro&id="+id+"&tabla=maestros";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#maestros').DataTable()
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