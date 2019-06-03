<?php
  if(isset($_GET['id']))
    $id_grupo = $_GET['id'];
  else{
    $URL="index.php?action=ver_grupos";
    echo "<script >document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  $carreras = MvcController::get_all('carreras');
  $grupo = MvcController::get_registro_by_id($id_grupo,'grupos');
  MvcController::update_grupo($id_grupo);
?>
<div class="col-md-9" >
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificando registro</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="clave">Clave</label>
                  <input type="text" value="<?php echo $grupo['clave']; ?>" class="form-control" name="clave" id="clave" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="cuatrimestre">Cuatrimestre</label>
                  <input type="number" value="<?php echo $grupo['cuatrimestre']; ?>" min="1" max="9" class="form-control" name="cuatrimestre" id="cuatrimestre" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="carreras">Elegir carrera</label>
                  <select class="form-control" name="id_carrera" id="carreras" required="">
                    <?php
                      foreach ($carreras as $carrera) {
                        if($carrera['id']!=$grupo['id_carrera'])
                          echo "<option value='$carrera[id]'> $carrera[siglas] - $carrera[nombre] </option>";
                        else
                            echo "<option value='$carrera[id]' selected> $carrera[siglas] - $carrera[nombre] </option>";
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