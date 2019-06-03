<?php
	$grupos = MvcController::get_grupos();
?>

<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de grupos registradas</h3>
            </div>
            <div class="box-body">
            	<table id="grupos" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Clave</th>
		                	<th>Pertenece al cuatrimestre</th>
		                	<th>Carrera</th>
		                	<th>Acciones</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($grupos as $grupo){?>
		                	<tr>
				                <td> <?php echo $grupo['clave']; ?> </td>
				                <td> <?php echo $grupo['cuatrimestre']; ?> </td>
				                <td> <?php echo $grupo['nombre_carrera']; ?> </td>
				                <td> 
				                	<a type="button" class="btn btn-warning" href="index.php?action=modificar_grupos&id=<?php echo $grupo['id']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
				                	<a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $grupo['id']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
				                </td>
			                </tr>
			            <?php } ?>
	                </tbody>
	                <thead>
	                <tfoot>
		                <tr>
		                	<th>Clave</th>
		                	<th>Pertenece al cuatrimestre</th>
		                	<th>Carrera</th>
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
                location.href="index.php?action=eliminar_registro&id="+id+"&tabla=grupos";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#grupos').DataTable()
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