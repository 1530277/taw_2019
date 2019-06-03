<?php
	if(isset($_GET['id'])&&isset($_GET['tabla'])){
		$id = $_GET['id'];
		$tabla = $_GET['tabla'];

		if($tabla != "maestros" && $tabla != "alumnos"){
			MvcController::delete_from($id,$tabla);
		}else{
			MvcController::delete_persona($id,$tabla);
		}
	}else{		
	    $URL="index.php?action=ver_tutorias";
	    echo "<script >document.location.href='{$URL}';</script>";
	    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	}
?>