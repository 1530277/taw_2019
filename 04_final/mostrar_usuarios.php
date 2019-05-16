<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <?php include_once('include_style.php'); ?>
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php
      include_once('db/database_utilities.php');
      $db_object = new pdo_db('localhost','root','','jugadores');
      if(isset($_REQUEST['tipo_usuario'])){
        $tipo_usuario=$_REQUEST['tipo_usuario'];
      }else{
        $tipo_usuario="Futbol";
      }
      if($tipo_usuario=="Futbol")
        $array_usuarios=$db_object->select_futbol();
      else
        $array_usuarios=$db_object->select_basquetbol();
      if(empty($array_usuarios))
        header('Location:agregar_usuarios.php?tipo_usuario='.$tipo_usuario);
    ?>
    <?php require_once('header.php'); ?>

     
    <div class="container">
      <div class="large-9 columns">
        <ul class="left button-group">
          <li><a href="mostrar_usuarios.php?tipo_usuario=Futbol" class="button">Futbol</a></li>
          <li><a href="mostrar_usuarios.php?tipo_usuario=Basquetbol" class="button">Basquetbol</a></li>
        </ul>
      </div>
        <h3><?php echo $tipo_usuario; ?></h3>
          <p>
             <a href="agregar_usuarios.php?tipo_usuario=<?php echo $tipo_usuario;?>" class="btn btn-success add-new"><i
             class="fa fa-plus"></i>Agregar nuevo</a> 
           </p>
        <div class="col-sm-4 right">
        </div><br>

      <div class="large-9 columns">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">                    
                    <table id="example" style="max-width:80%!important;">
                        <thead>
                          <tr>
                            <th>Dorsal</th>
                            <th>Nombre</th>
                            <th>Posición</th>
                            <th>Carrera</th>
                            <th>Email</th>
                            <th>Disciplina</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($array_usuarios as $usuarios) {
                            ?>
                          <tr>
                            <th><?php echo $usuarios['dorsal']; ?></th>
                            <th><?php echo $usuarios['nombre']; ?></th>
                            <th><?php echo $usuarios['posicion']; ?></th>
                            <th><?php echo $usuarios['carrera']; ?></th>
                            <th><?php echo $usuarios['email']; ?></th>
                            <th><?php echo $usuarios['disciplina']; ?></th>
                            <td>
                                  <a type="button" class="edit" href="modificar_usuarios.php?tipo_usuario=<?php echo$tipo_usuario;?>&id=<?php echo $usuarios['id']; ?>" title="Editar" data-toggle="tooltip">
                                    <i class="material-icons">&#xE254</i>
                                  </a>
                                  <a type="button" class="delete" onclick="confirmar('<?php echo $usuarios['id']; ?>','<?php echo $tipo_usuario; ?>')" title="Eliminar" data-toggle="tooltip">
                                    <i class="material-icons" style="cursor:pointer;">&#xE872</i>
                                  </a>
                              </td>
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

<script>
    function confirmar(id,tipo){
        var reply=confirm("¿Seguro que desea eliminar este registro?");
        if (reply==true){
            location.href="borrar_usuarios.php?id="+id;
        }
        else{
        //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
        }
    }
</script>