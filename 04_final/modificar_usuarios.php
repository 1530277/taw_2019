<!DOCTYPE html>
<html>
<head>
	<meta carset="utf-8">
	<meta http-equiv="X-UA-Compatible" contennt="IE=edge">
	<meta name="viewport" content="width=devce-width, initial-scale=1" >
	<title>CRUD a bd usando POO</title>
	<?php include_once('include_style.php'); ?>
</head>
<body>
<?php    
    include_once('db/database_utilities.php');
    $db_object = new pdo_db('localhost','root','','jugadores');
    #Valida que exista esta variable para poder guardar datos de forma que corresponde
    if(empty($_REQUEST['tipo_usuario']))
      header('index.php');

    //mhrodriguez/php-mvc-pdo-sample
    else
      $tipo_usuario=$_REQUEST['tipo_usuario'];
    include_once('header.php');
    if(isset($_REQUEST['id'])){
      $id=$_REQUEST['id'];
      $usuario=$db_object->get_usuario($id);
    }
  ?>
<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Agregar <b>Cliente</b></h2></div>
                      <div class="col-sm-4">
                           <a href="mostrar_usuarios.php?tipo_usuario=<?php echo $tipo_usuario; ?>" class="btn btn-info add-new"><i
                           class="fa fa-arrow-left"></i>Regresar</a> 
                      </div>
                </div>
            </div>
            <?php
                if (isset($_POST) && !empty($_POST)) {
                  $nombre = $_POST['nombre'];
                  $posicion = $_POST['posicion'];
                  $dorsal = $_POST['dorsal'];
                  $carrera= $_POST['carrera'];
                  $email = $_POST['email'];
                  $disciplina=$_REQUEST['tipo_usuario'];
                  $id=$_REQUEST['id'];
                  $res = $db_object->update_usuario($dorsal,$nombre,$posicion,$carrera,$email,$disciplina,$id);
                  if ($res) {
                    $message = "Datos insertados con éxito";
                    $class = "alert alert-success";
                  }else{
                    $message="No se pudieron insertar los datos";
                    $class="alert alert-danger";
                }
             ?>
           
           <div class="<?php echo $class;?>">
             <?php echo $message;?>
           </div>
              <?php
          }
        
        
        ?>
        <div class="row">
         <form method="post" action="modificar_usuarios.php?tipo_usuario=<?php echo $tipo_usuario; ?>&id=<?php echo $id; ?>">
         <div class="col-md-6">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombres" value="<?php echo $usuario['nombre']; ?>" class='form-control' maxlenght="100" required >
         </div>
         <div class="col-md-6">
            <label>Dorsal:</label>
            <input type="number" name="dorsal" id="apellidos" value="<?php echo $usuario['dorsal']; ?>" class='form-control' maxlenght="100" required>  
         </div>
         <div class="col-md-6">
            <label>Posición:</label>
            <input type="text" name="posicion" id="telefono" value="<?php echo $usuario['posicion']; ?>"  class='form-control' maxlenght="15" required>
         </div>
         <div class="col-md-6">
            <label>Carrera:</label>
            <input type="text" name="carrera" id="correo_electronico" value="<?php echo $usuario['carrera']; ?>"  class='form-control' maxlenght ="64" required>
         </div>
         <div class="col-md-6">
            <label>Email:</label>
            <input type="email" name="email" id="correo_electronico" value="<?php echo $usuario['email']; ?>" class='form-control' maxlenght ="64" required>
         
         </div>
         <div class ="col-md-12 pull-right">
          <hr>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
         </div>
         </form>
       </div>
    </div>
  </div>
</body>
</html>