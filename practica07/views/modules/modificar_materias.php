<?php
if(isset($_GET['id']))
    $id_materia = $_GET['id'];
  else{
    $URL="index.php?action=ver_maestros";
    echo "<script >document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  $materia = MvcController::get_registro_by_id($id_materia,'materias');
  $maestros = MvcController::get_maestros();
  $carreras = MvcController::get_all('carreras');
  MvcController::update_materia($id_materia);
?>

<div class="col-md-9" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificando registro</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="clave">Clave</label>
                  <input type="text" value="<?php echo $materia['clave']; ?>" class="form-control" name="clave" id="clave" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" value="<?php echo $materia['nombre']; ?>" class="form-control" name="nombre" id="nombre" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="materno">Elegir maestro</label>
                  <select class="form-control" name="id_maestro" id="maestros" required="">
                  	<?php
                  		foreach ($maestros as $maestro) {
                        if($materia['id_maestro']!=$maestro['id_maestro']){
                      			echo "<option value='$maestro[id_maestro]'> $maestro[numero_empleado] - $maestro[nombres] $maestro[paterno] $maestro[materno] </option>";
                  		  }else{
                          echo "<option value='$maestro[id_maestro]' selected> $maestro[numero_empleado] - $maestro[nombres] $maestro[paterno] $maestro[materno] </option>";
                        }
                      }
                  	?>
                  </select>
              	</div>
              	<div class="form-group">
                  <label for="carreras">Elegir carrera</label>
                  <select class="form-control" name="id_carrera" id="carreras" required="">
                  	<?php
                  		foreach ($carreras as $carrera) {
                        if($carrera['id']!=$materia['id_carrera']){
                  			 echo "<option value='$carrera[id]'> $carrera[siglas] - $carrera[nombre] </option>";
                        }else{
                           echo "<option value='$carrera[id]' selected> $carrera[siglas] - $carrera[nombre] </option>";
                        }
                  		}
                  	?>
                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="guardar" class="btn btn-primary">Guardar datos</button>
              </div>
            
            </form>
          </div>
          <!-- /.box -->
</div>
<script type="text/javascript">
	
  $(function () {
    $('[data-mask]').inputmask()
  })

</script>