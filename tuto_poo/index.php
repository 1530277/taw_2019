<!DOCTYPE html>
<html>
<head>
	<meta carset="utf-8">
	<meta http-equiv="X-UA-Compatible" contennt="IE=edge">
	<meta name="viewport" content="width=devce-width, initial-scale=1" >
	<title>CRUD a bd usando POO</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-purple sidebar-mini fixed">
<div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-8"><h2>Ver <b>Clientes</b></h2></div>
                      <div class="col-sm-4">
                           <a href="create.php" class="btn btn-success add-new"><i
                           class="fa fa-plus"></i>Agregar nuevo</a> 
                      </div>
                </div>
            </div>
            <?php
            include ("database.php");
            $clientes =  new Database();
            $resultado=$clientes->read();#Función en database.php que retorna una objeto consulta
            #esta es la forma en que se hace un arreglo con una consulta de varias filas con msqli
            while($fila = $resultado->fetch_assoc())
                $personas[]=$fila;
        ?>
        <div class="row">
         <form method="post">
					        <!-- DATOS TABLA !-->
					        <div class="box box-primary">
				           				
							        	<!-- /.box-header -->
				            <div class="box-body">
	                            <table id="mostrar_maestros" class="table-wrapper">
					                <thead>
						                <tr>
						                  <th>Nombre</th>
						                  <th>Apellidos</th>
						                  <th>Dirección</th>
						                  <th>Teléfono</th>
						                  <th>Correo electrónico</th>
						                  <th colspan="3">Acciones</th>
						                </tr>
					                </thead>
					                <tbody>
                                    <?php for($i=0;$i<count($personas);$i++){#Recorre el arreglo ?>
					                		<tr>
					                			<td><?php echo $personas[$i]['nombres']; ?></td>
					                			<td><?php echo $personas[$i]['apellidos']; ?></td>
					                			<td><?php echo $personas[$i]['telefono']; ?></td>
					                			<td><?php echo $personas[$i]['direccion']; ?></td>
					                			<td><?php echo $personas[$i]['correo_electronico']; ?></td>
					                			<td>
					                				<a type="button" class="edit" href="update.php?id=<?php echo $personas[$i]['id']; ?>" title="Editar" data-toggle="tooltip">
									                	<i class="material-icons">&#xE254</i>
									              	</a>
					                				<a type="button" class="delete" onclick="confirmar(<?php echo $personas[$i]['id']; ?>)" title="Eliminar" data-toggle="tooltip">
									                	<i class="material-icons" style="cursor:pointer;">&#xE872</i>
									              	</a>
									            </td>
					                		</tr>
                                    <?php } ?>
					                </tbody>
					              </table>
					            </div>
				            </div>
				            <!-- /.box-body -->
				          </div>
          <!-- /.box -->
          </div>
        </div>
    </div>
    <script>
        function confirmar(id){
            var reply=confirm("¿Seguro que desea eliminar este registro?")
            if (reply==true) 
            {
                location.href="delete.php?id="+id;
            }
            else 
            {
            //AQUI NO HARIA NADA, SE CERRARIA EL POPUP Y SEGUIRIA EN LA PAGINA ACTUAL
            }
        }
</script>
</body>