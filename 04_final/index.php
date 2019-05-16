<?php
  include_once('db/database_utilities.php');
  $db_object = new pdo_db('localhost','root','','tarea03');
  #echo "<br><br>ejemplo: ";
  #var_dump($db_object->count_inactivos());
  #echo"<br><br>";

  $user=$db_object->select_user();
  $user_log=$db_object->select_user_log();
  $user_type=$db_object->select_user_type();
  $status=$db_object->select_status();

?>
<!DOCTYPE HTML>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Total de registros</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <tr>
                    <th width="200">Usuarios</th>
                    <th width="250">Tipo de usuarios</th>
                    <th width="250">Status</th>
                    <th width="250">Accesos</th>
                    <th width="250">Usuarios activos</th>
                    <th width="250">Usuarios inactivos</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th width="200"><?php echo $db_object->count_user(); ?></th>
                    <th width="250"><?php echo $db_object->count_user_type(); ?></th>
                    <th width="250"><?php echo $db_object->count_status(); ?></th>
                    <th width="250"><?php echo $db_object->count_user_log(); ?></th>
                    <th width="250"><?php echo $db_object->count_activos(); ?></th>
                    <th width="250"><?php echo $db_object->count_inactivos(); ?></th>
                  </tr>
                </tbody>
              </table>
            </div>

          </section>

        </div>
      </div>

      <div class="large-9 columns">
        <h3>User</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Email</th>
                    <th width="250">Pssw</th>
                    <th width="250">Status</th>
                    <th width="250">User type</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($user as $u){ ?>
                  <tr>
                    <th width="200"><?php echo $u['id']; ?></th>
                    <th width="250"><?php echo $u['email']; ?></th>
                    <th width="250"><?php echo $u['passw']; ?></th>
                    <th width="250"><?php echo $u['status']; ?></th>
                    <th width="250"><?php echo $u['user_type']; ?></th>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

          </section>

        </div>
      </div>


      <div class="large-9 columns">
        <h3>User log</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Date_logged</th>
                    <th width="250">User id</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($user_log as $u){ ?>
                  <tr>
                    <th width="200"><?php echo $u['id']; ?></th>
                    <th width="250"><?php echo $u['date_logged']; ?></th>
                    <th width="250"><?php echo $u['email']; ?></th>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

          </section>

        </div>
      </div>


      <div class="large-9 columns">
        <h3>User type</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($user_type as $u){ ?>
                  <tr>
                    <th width="200"><?php echo $u['id']; ?></th>
                    <th width="250"><?php echo $u['name']; ?></th>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

          </section>

        </div>
      </div>


      <div class="large-9 columns">
        <h3>Status</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($status as $u){ ?>
                  <tr>
                    <th width="200"><?php echo $u['id']; ?></th>
                    <th width="250"><?php echo $u['name']; ?></th>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

          </section>

        </div>
      </div>

</div>
    </div>
</body>    

    <?php require_once('footer.php'); ?>