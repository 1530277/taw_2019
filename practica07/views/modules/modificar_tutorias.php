<?php
  if(isset($_GET['id']))
    $id_tutoria = $_GET['id'];
  else{
    $URL="index.php?action=ver_grupos";
    echo "<script >document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  $res = MvcController::update_tutoria($id_tutoria);
  $carreras = MvcController::get_all('carreras');
  $tutoria = MvcController::get_registro_by_id($id_tutoria,"sesion_tutoria");
  $maestros = MvcController::get_maestros();    
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
                  <label for="fecha">Fecha</label>
                  <input type="date" value="<?php echo $tutoria['fecha']; ?>" class="form-control" name="fecha" id="fecha" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="hora">Hora</label>
                  <input type="time" value="<?php echo $tutoria['hora']; ?>" class="form-control" name="hora" id="hora" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="tipo">Tipo</label>
                  <input type="text" value="<?php echo $tutoria['tipo']; ?>" class="form-control" name="tipo" id="tipo" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="tema">Tema</label>
                  <input type="text" value="<?php echo $tutoria['tema']; ?>" class="form-control" name="tema" id="tema" placeholder="" required>
                </div>
                
                <div class="form-group">
                  <label for="materno">Elegir maestro</label>
                  <select class="form-control" name="id_maestro" id="maestros" required="">
                    <?php
                      foreach ($maestros as $maestro) {
                        if($tutoria['id_maestro']!=$maestros['id_maestro'])
                          echo "<option value='$maestro[id_maestro]'> $maestro[numero_empleado] - $maestro[nombres] $maestro[paterno] $maestro[materno] </option>";
                        else
                          echo "<option value='$maestro[id_maestro]' selected> $maestro[numero_empleado] - $maestro[nombres] $maestro[paterno] $maestro[materno] </option>";
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