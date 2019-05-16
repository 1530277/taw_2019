<?php
	class pdo_db{
		private $mbd;#Variable tipo objeto PDO, la cual sirve para 
		public $db_host;
		public $db_passw;
		public $db_name;
		public $db_user;

		public function pdo_db($host,$user,$passw,$dbname){

			//Inicializa variables para la conexión con la bd
			$this->db_host=$host;
			$this->db_passw=$passw;
			$this->db_name=$dbname;
			$this->db_user=$user;
			
			try{
				$this->mbd = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}",$this->db_user,$this->db_passw);
				$this->mbd-> exec("set names utf8");
			}catch(PDOException $e){
				echo "Error-PDO: ".$e->getMessage()."<br>";
				die();
			}
		}


		/************************************
		Funciones correspondientes al ejercicio 1
		********************************/

		//Funciones selectd dónde se aplica un COUNT en cada consulta para todas las tablas, retornan un arreglo con 2 casillas, en ambas está el mismo valor, esto se puede visualizar con var_dump(). Sin embargo, para efectos de evitar recibir un arreglo en el otro archivo en cada función se apunta directamente a un retorno del indice 0 en cada arreglo, como se aprecia en la linea 29.

		public function count_user(){
			$query=$this->mbd->prepare('SELECT COUNT(*) FROM user');
			$query->execute();
			return $query->fetch()[0];
		}
		public function count_user_log(){
			$query=$this->mbd->prepare('SELECT COUNT(*) FROM user_log');
			$query->execute();
			return $query->fetch()[0];
		}
		public function count_user_type(){
			$query=$this->mbd->prepare('SELECT COUNT(*) FROM user_type');
			$query->execute();
			return $query->fetch()[0];
		}
		public function count_status(){
			$query=$this->mbd->prepare('SELECT COUNT(*) FROM status');
			$query->execute();
			return $query->fetch()[0];
		}
		public function count_activos(){
			$query=$this->mbd->prepare('SELECT COUNT(*) FROM user WHERE status_id=1');
			$query->execute();
			return $query->fetch()[0];
		}
		public function count_inactivos(){
			$query=$this->mbd->prepare('SELECT COUNT(*) FROM user WHERE status_id=2');
			$query->execute();
			return $query->fetch()[0];
		}


		//Funciones que retornan un arreglo con todos los elementos dentro de cada tabla respectivamente

		public function select_user(){
			$query=$this->mbd->prepare('SELECT u.id,u.email,u.passw,ut.name as "user_type", s.name as "status" FROM user u
				INNER JOIN user_type ut
				ON ut.id=u.user_type_id
				INNER JOIN status s
				ON s.id=u.status_id');
			$query->execute();
			return $query->fetchAll();
		}
		public function select_user_log(){
			$query=$this->mbd->prepare('SELECT ul.id,ul.date_logged,u.email FROM user_log ul
				INNER JOIN u
				ON u.id=ul.user_id');
			$query->execute();
			return $query->fetchAll();
		}
		public function select_user_type(){
			$query=$this->mbd->prepare('SELECT * FROM user_type');
			$query->execute();
			return $query->fetchAll();
		}
		public function select_status(){
			$query=$this->mbd->prepare('SELECT * FROM status');
			$query->execute();
			return $query->fetchAll();
		}

		/************************************
		Funciones correspondientes al ejercicio 2
		********************************/
		function select_futbol(){
			$query=$this->mbd->prepare('SELECT * FROM usuarios WHERE disciplina="Futbol"');
			$query->execute();
			return $query->fetchAll();
		}
		function select_basquetbol(){
			$query=$this->mbd->prepare('SELECT * FROM usuarios WHERE disciplina="Basquetbol"');
			$query->execute();
			return $query->fetchAll();
		}
		function get_usuario($id){
			$query=$this->mbd->prepare("SELECT * FROM usuarios WHERE id=$id");
			$query->execute();
			return $query->fetch();
		}
		function insert_usuario($dorsal,$nombre,$posicion,$carrera,$email,$disciplina){
			$query=$this->mbd->prepare("INSERT INTO usuarios(dorsal,nombre,posicion,carrera,email,disciplina)VALUES('$dorsal','$nombre','$posicion','$carrera','$email','$disciplina')");
			$res=$query->execute();
			return $res;
		}
		function delete_usuario($id){
			$query=$this->mbd->prepare("DELETE FROM usuarios WHERE id=$id");
			$res=$query->execute();
			return $res;
		}
		function update_usuario($dorsal,$nombre,$posicion,$carrera,$email,$disciplina,$id){
			$query=$this->mbd->prepare("UPDATE usuarios SET 
				dorsal='$dorsal',
				nombre='$nombre',
				posicion='$posicion',
				carrera='$carrera',
				email='$email',
				disciplina='$disciplina'
			WHERE id='$id'");
			$res=$query->execute();
			return $res;
		}
	}
?>