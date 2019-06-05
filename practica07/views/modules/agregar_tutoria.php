<?php
  echo "algo";
  $res = MvcController::insert_tutoria();
  $carreras = MvcController::get_all('carreras');
  $maestros = MvcController::get_maestros();
?>

<div class="col-md-9" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva tutoria</h3>
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
            <form role="form" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="fecha">Fecha</label>
                  <input type="date" class="form-control" name="fecha" id="fecha" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="hora">Hora</label>
                  <input type="time" class="form-control" name="hora" id="hora" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="tipo">Tipo</label>
                  <input type="text" class="form-control" name="tipo" id="tipo" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="tema">Tema</label>
                  <input type="text" class="form-control" name="tema" id="tema" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="materno">Elegir maestro</label>
                  <select class="form-control" name="id_maestro" id="maestros" required="">
                    <?php
                      foreach ($maestros as $maestro) {
                        echo "<option value='$maestro[id_maestro]'> $maestro[numero_empleado] - $maestro[nombres] $maestro[paterno] $maestro[materno] </option>";
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