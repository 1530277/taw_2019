<?php
  if(isset($_GET['id']))
    $id_materia = $_GET['id'];
  else{
    $URL="index.php?action=ver_materias";
    echo "<script >document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
   $alumnos_disponibles = MvcController::get_alumnos_disponibles($id_materia);//Alumnos que no estén registrados en esta materia
   $alumnos_materia = MvcController::get_alumnos_by_materia($id_materia);
   $res = MvcController::insert_alumno_materia($id_materia);
   if($res){
     echo "<script></script>";
   }
?>


<div class="col-md-9" >
          <!-- general form elements -->
        <div class="box box-primary">          
          <div class="box-header with-border">
            <h3 class="box-title">Agregar alumnos a la materia</h3>
          </div>
          <form method="post" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="alumno">Alumnos disponibles para esta materia</label>
                  <select class="form-control" name="id_alumno" id="alumno" required="">
                    <?php
                      foreach ($alumnos_disponibles as $alumno) {
                        echo "<option value='$alumno[id_alumno]'> $alumno[matricula] - $alumno[nombres] $alumno[paterno] $alumno[materno] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="guardar" class="btn btn-success form-control"><i class="fa fa-fw fa-plus-square"></i> Agregar nuevo </button>
              </div>
            </form>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de materias registradas</h3>
            </div>
            <div class="box-body">
            	<table id="alumnos_materia" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                	<th>Matricula</th>
		                	<th>Nombre alumno</th>
		                	<th></th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php foreach($alumnos_materia as $alumno){?>
		                	<tr>
				                <td> <?php echo $alumno['matricula']; ?> </td>
				        		    <td> <?php echo $alumno['nombres']." ".$alumno['paterno']." ".$alumno['materno']; ?> </td>
                        <td>
                          <a type="button" class="btn btn-danger" onclick="confirmar('<?php echo $alumno['id_persona']; ?>','<?php echo $alumno['id_materia']; ?>')" title="Eliminar" data-toggle="tooltip"><i class="fa fa-fw fa-trash"></i></a>
				                </td>
			                </tr>
			            <?php } ?>
	                </tbody>
	                <tfoot>
		                <tr>
		                	<th>Matricula</th>
		                	<th>Nombre alumno</th>
		                	<th></th>
		                </tr>
	                </tfoot>
            	</table>
        	</div>
        </div>
</div>

<script>

		function confirmar(id_persona,id_materia){
            var reply=confirm("¿Seguro que desea eliminar este registro?");
            if (reply==true){
                location.href="index.php?action=eliminar_registro&id_persona="+id_persona+"&id_materia="+id_materia+"&tabla=alumnos_materias";
            }
            else {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }

		$(function () {
			$('#alumnos_materia').DataTable()
		})
</script>