<?php
	/*
		Autor: Luis Angel Torres Grimaldo, estudiante de Ingeniería en Tecnologías de la Información de la Universidad Politécnica de Victoria.
		
	*/



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

		public function insert_carrera(){
			if(isset($_POST['guardar'])){
				$datos_consulta = array('nombre' => $_POST['nombre'],'siglas' => $_POST['siglas']);
				$ret = Datos::insert_carrera($datos_consulta);
				return $ret;
			}else
				return false;
		}

		public function insert_alumno(){
			if(isset($_POST['guardar'])){
				$datos_persona = array('nombres' => $_POST['nombres'],'paterno' => $_POST['paterno'],
						'materno' => $_POST['materno'], 'telefono' => $_POST['telefono'],
						'correo' => $_POST['correo']);
				$id_persona = Datos::insert_persona($datos_persona);
				if($id_persona!=0){
					$datos_alumno = array('matricula' => $_POST['matricula'],'id_persona' => $id_persona);
					$r = Datos::insert_alumno($datos_alumno);
					return $r;
				}else
					return false;
			}else
				return false;
		}

		public function insert_maestro(){

			if(isset($_POST['guardar'])){
				$datos_persona = array('nombres' => $_POST['nombres'],'paterno' => $_POST['paterno'],
						'materno' => $_POST['materno'], 'telefono' => $_POST['telefono'],
						'correo' => $_POST['correo']);
				$id_persona = Datos::insert_persona($datos_persona);
				if($id_persona!=0){
					$datos_maestro = array('numero_empleado' => $_POST['numero_empleado'], 
						'id_persona' => $id_persona);
					$r = Datos::insert_maestro($datos_maestro);
					return $r;
				}else
					return false;
			}else
				return false;
		}

		public function insert_materia(){
			if(isset($_POST['guardar'])){
				$datos_consulta = array('clave' => $_POST['clave'], 'nombre' => $_POST['nombre']
					, 'id_maestro' => $_POST['id_maestro'], 'id_carrera' => $_POST['id_carrera']);
				$ret = Datos::insert_materia($datos_consulta);
				return $ret;
			}else
				return false;
		}

		public function insert_grupo(){
			if(isset($_POST['guardar'])){
				$datos_consulta = array('clave' => $_POST['clave'], 'id_carrera' => $_POST['id_carrera'],
				'cuatrimestre' => $_POST['cuatrimestre']);
				$res = Datos::insert_grupo($datos_consulta);
				return $res;
			}else
				return false;
		}

		public function update_carrera($id_carrera){
			if(isset($_POST['guardar'])){
				$datos_consulta = array('id' => $id_carrera, 'nombre' => $_POST['nombre'],
					'siglas' => $_POST['siglas']);
				$ret = Datos::update_carrera($datos_consulta);
				if($ret){
				    $URL="index.php?action=ver_carreras";
				    echo "<script >document.location.href='{$URL}';</script>";
				    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				}else
					return false;
			}else
				return false;
		}

		public function update_alumno($id_persona){
			if(isset($_POST['guardar'])){
				$datos_consulta = array('id_persona' => $id_persona, 'nombres' => $_POST['nombres'],
					'paterno' => $_POST['paterno'], 'materno' => $_POST['materno'],
					'matricula' => $_POST['matricula'], 'telefono' => $_POST['telefono'],
					'correo' => $_POST['correo']);
				$ret = Datos::update_alumno($datos_consulta);

				if($ret){
				    $URL="index.php?action=ver_alumnos";
				    echo "<script >document.location.href='{$URL}';</script>";
				    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				}else
					return false;
			}else
				return false;
		}

		public function update_maestro($id_persona){
			if(isset($_POST['guardar'])){
				$datos_consulta = array('id_persona' => $id_persona, 'nombres' => $_POST['nombres'],
					'paterno' => $_POST['paterno'], 'materno' => $_POST['materno'],
					'numero_empleado' => $_POST['numero_empleado'], 'telefono' => $_POST['telefono'],
					'correo' => $_POST['correo']);
				$ret = Datos::update_alumno($datos_consulta);
				
				if($ret){
				    $URL="index.php?action=ver_maestros";
				    echo "<script >document.location.href='{$URL}';</script>";
				    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				}else
					return false;
			}else
				return false;
		}

		public function get_materias(){
			$ret = Datos::get_materias();
			return $ret;
		}

		public function get_maestros(){
			$ret = Datos::get_maestros();
			return $ret;
		}

		public function get_personas($tabla){
			$ret = Datos::get_personas($tabla);
			return $ret;
		}

		public function get_persona_by_id($id,$tabla){
			$ret = Datos::get_persona_by_id($id,$tabla);
			return $ret;
		}

		public function get_registro_by_id($id,$tabla){
			$ret = Datos::get_registro_by_id($id,$tabla);
			return $ret;
		}

		public function get_all($tabla){
			$ret = Datos::get_all($tabla);
			return $ret;
		}

	}
?>