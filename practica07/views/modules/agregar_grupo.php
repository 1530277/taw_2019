<?php
    $res = MvcController::insert_grupo();
    $carreras = MvcController::get_all('carreras');
?>
<div class="col-md-9" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo grupo</h3>
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
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="clave">Clave</label>
                  <input type="text" class="form-control" name="clave" id="clave" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="cuatrimestre">Cuatrimestre</label>
                  <input type="number" min="1" max="9" class="form-control" name="cuatrimestre" id="cuatrimestre" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="carreras">Elegir carrera</label>
                  <select class="form-control" name="id_carrera" id="carreras" required="">
                    <?php
                      foreach ($carreras as $carrera) {
                        echo "<option value='$carrera[id]'> $carrera[siglas] - $carrera[nombre] </option>";
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