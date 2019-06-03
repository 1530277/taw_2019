<?php
if(isset($_GET['id']))
    $id_persona = $_GET['id'];
  else{
    $URL="index.php?action=ver_maestros";
    echo "<script >document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  $maestro = MvcController::get_persona_by_id($id_persona,'maestros');
  MvcController::update_maestro($id_persona);
?>

<div class="col-md-9" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificando registro</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombres">Nombres</label>
                  <input type="text" value="<?php echo $maestro['nombres']; ?>" class="form-control" name="nombres" id="nombres" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="paterno">Apellido paterno</label>
                  <input type="text" value="<?php echo $maestro['materno']; ?>"  class="form-control" name="paterno" id="paterno" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="materno">Apellido materno</label>
                  <input type="text" value="<?php echo $maestro['paterno']; ?>"  class="form-control" name="materno" id="materno" placeholder="" required>
              	</div>
              	<div class="form-group">
                  <label for="numero_empleado">Número de empleado</label>
                  <input type="text" value="<?php echo $maestro['numero_empleado']; ?>"  class="form-control" name="numero_empleado" id="numero_empleado" placeholder="" required>
                </div>

                <div class="form-group">
                  	<label for="telefono">Número telefónico fijo o celular</label>
	                <div class="input-group">
	                  <div class="input-group-addon">
	                    <i class="fa fa-phone"></i>
	                  </div>
	                  <input type="text" value="<?php echo $maestro['telefono']; ?>"  id="telefono" name="telefono" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
	                </div>
                  <!-- /.input group -->
              	</div>
              	
              	<div class="form-group">
                  <label for="correo">Correo electrónico</label>
                  <div class="input-group">
	                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                  <input type="email" value="<?php echo $maestro['correo']; ?>"  class="form-control" name="correo" id="correo" placeholder="" required>
                  </div>
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