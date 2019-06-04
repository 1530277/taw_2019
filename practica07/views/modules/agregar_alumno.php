<?php
	$res = MvcController::insert_alumno();
?>

<div class="col-md-9" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva alumno</h3>
            </div>
            <!-- /.box-header -->

            <?php if($res==1){ ?>
              <div class="box box-success" style="background: #dff0d8!important;color:green!important;margin:0 auto;width: 70%;">
                <div class="box-header with-border">
                  <h3 class="box-title">Notificación</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  Los datos fueron guardados exitosamente.
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            <?php } ?>

            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="nombres">Nombres</label>
                  <input type="text" class="form-control" name="nombres" id="nombres" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="paterno">Apellido paterno</label>
                  <input type="text" class="form-control" name="paterno" id="paterno" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="materno">Apellido materno</label>
                  <input type="text" class="form-control" name="materno" id="materno" placeholder="" required>
              	</div>
              	<div class="form-group">
                  <label for="matricula">Matrícula</label>
                  <input type="text" class="form-control" name="matricula" id="matricula" placeholder="" required>
                </div>

                <div class="form-group">
                  	<label for="telefono">Número telefónico fijo o celular</label>
	                <div class="input-group">
	                  <div class="input-group-addon">
	                    <i class="fa fa-phone"></i>
	                  </div>
	                  <input type="text" id="telefono" name="telefono" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
	                </div>
                  <!-- /.input group -->
              	</div>
              	
              	<div class="form-group">
                  <label for="correo">Correo electrónico</label>
                  <div class="input-group">
	                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                  <input type="email" class="form-control" name="correo" id="correo" placeholder="" required>
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