<?php
  if(isset($_GET['id']))
    $id_carrera = $_GET['id'];
  else{
    $URL="index.php?action=ver_carreras";
    echo "<script >document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  $carrera = MvcController::get_registro_by_id($id_carrera,'carreras');
  MvcController::update_carrera($id_carrera);
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
                  <label for="nombre">Nombre de la carrera</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $carrera['nombre']; ?>" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="siglas">Siglas</label>
                  <input type="text" class="form-control" name="siglas" id="siglas" value="<?php echo $carrera['siglas']; ?>" placeholder="" required>
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