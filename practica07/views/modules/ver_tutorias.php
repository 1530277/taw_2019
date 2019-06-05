<?php
	$tutorias = MvcController::get_tutorias();
?>

<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de tutorias registradas</h3>
            </div>
            <div class="box-body">
            	<table id="tutorias" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Número empleado</th>
		                	<th>Maestro asignado</th>
		                	<th>Fecha</th>
		                	<th>Hora</th>
		                	<th>Tipo</th>
		                	<th>Tema</th>
		                	<th>Acciones</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($tutorias as $tutoria){?>
		                	<tr>
				                <td> <?php echo $tutoria['numero_empleado']; ?> </td>
				                <td> <?php echo $tutoria['nombres']." ".$tutoria['paterno']." ".$tutoria['materno']; ?> </td>
				                <td> <?php echo $tutoria['fecha']; ?> </td>
				                <td> <?php echo $tutoria['hora']; ?> </td>
				                <td> <?php echo $tutoria['tipo']; ?> </td>
				                <td> <?php echo $tutoria['tema']; ?> </td>
<<<<<<< HEAD
				                <td>
                          <a type="button" class="btn btn-warning" href="index.php?action=modificar_tutorias&id=<?php echo $tutoria['id']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
=======
				                <td> 
				                	<a type="button" class="btn btn-warning" href="index.php?action=modificar_tutorias&id=<?php echo $tutoria['id']; ?>" title="Modificar" data-toggle="tooltip"><i class="fa fa-fw fa-edit"></i></a>
>>>>>>> 9a22a42dd416e4a3a61d0cfb64a6ca14b9af70d6
				                	<a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $tutoria['id']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
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
                location.href="index.php?action=eliminar_registro&id="+id+"&tabla=tutorias";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#tutorias').DataTable()
<<<<<<< HEAD
=======
			/*$('#example2').DataTable({
			  'paging'      : true,
			  'lengthChange': false,
			  'searching'   : false,
			  'ordering'    : true,
			  'info'        : true,
			  'autoWidth'   : false
			})*/
>>>>>>> 9a22a42dd416e4a3a61d0cfb64a6ca14b9af70d6
		})
</script>