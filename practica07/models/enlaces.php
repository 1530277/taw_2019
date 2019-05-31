<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){
		$nombres = ['eliminar_registro','ver_alumnos','ver_maestros','ver_materias','ver_carreras','modificar_materias','modificar_alummnos','modificar_maestros','modificar_carreras','agregar_alumno','agregar_maestro','agregar_materia','agregar_carrera','cerrar_sesion','dashboard','login'];

		$module = "views/modules/login.php";//Se inicializa con una url por defecto, por si el parámetro no coincide con ningun valor en el arreglo así la variable de retorno ya contiene un valor, si coincide el parámetro con algún valor del arreglo solo se sobre escribe.
		for($i = 0;$i < count($nombres);$i ++)
			if($enlaces==$nombres[$i]){
				$module =  "views/modules/".$enlaces.".php";
			}
		
		return $module;

	}

}

?>