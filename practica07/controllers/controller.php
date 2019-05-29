<?php
	class MvcController{

		#LLAMADA A LA PLANTILLA
		#-------------------------------------

		public function pagina(){	
			
			include "views/template.php";
		
		}

		#ENLACES
		#-------------------------------------

		public function enlacesPaginasController(){
			$enlaces="index";
			if(isset( $_GET['action'])){
				
				$enlaces = $_GET['action'];
			
			}

			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			

			include_once ($respuesta);

		}

	}
?>