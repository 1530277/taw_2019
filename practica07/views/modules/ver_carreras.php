<?php
	$carreras = MvcController::get_all('carreras');
?>

<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de carreras registradas</h3>
            </div>
            <div class="box-body">
            	<table id="carreras" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Siglas</th>
		                	<th>Nombre</th>
		                	<th>Acciones</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($carreras as $carrera){?>
		                	<tr>
				                <td> <?php echo $carrera['siglas']; ?> </td>
				                <td> <?php echo $carrera['nombre']; ?> </td>
				                <td> 
				                	<a type="button" class="btn btn-warning" href="index.php?action=modificar_carreras&id=<?php echo $carrera['id']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
				                	<a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $carrera['id']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
				                </td>
			                </tr>
			            <?php } ?>
	                </tbody>
	                <tfoot>
		                <tr>
		                	<th>Siglas</th>
		                	<th>Nombre</th>
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
                location.href="index.php?action=eliminar_registro&id="+id+"&tabla=carreras";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#carreras').DataTable()
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