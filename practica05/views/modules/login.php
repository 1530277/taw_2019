<div class="content">
  <?php
  session_start();
  if(isset($_SESSION['id_alumno'])){
    header('Location:index.php?action=dashboard');
  }?>
  <div class="col-md-9">
          <!-- Horizontal Form -->
          <div class="box box-info">
              <h1 class="box-title">Iniciar sesión</h1>
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="registrar" class="btn btn-info pull-right form-control">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
</div>
</div>

 <?php
  $controlador = new MvcController();
  $controlador->c_login();
?>