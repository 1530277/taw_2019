<?php
	include_once('db/database_utilities.php');
	$db_object=new pdo_db('localhost','root','','jugadores');
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$db_object->delete_usuario($id);
	}
	header("Location:mostrar_usuarios.php");
?>