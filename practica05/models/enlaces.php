<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){

		if($enlaces == "ver_usuarios" || $enlaces == "ver_productos" || $enlaces == "realizar_venta" || $enlaces == "agregar_producto" || $enlaces == "dashboard" || $enlaces == "cerrar_sesion" || $enlaces == "registrarse" || $enlaces == "login"){

			$module =  "views/modules/".$enlaces.".php";
		}

		else if($enlaces == "index"){

			$module =  "views/modules/registrarse.php";
		
		}
		
		return $module;

	}

}

?>