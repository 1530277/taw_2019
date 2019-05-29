<?php
    #Definir la clase persona
    class persona{
        //Definir propiedades
        public $nombre;
        public $edad;
        public $altura;
        public $peso;
        private $mbd;

        #Definir método obtención de datos (getters)
        public function getNombre(){
            return $this->nombre;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function getPeso(){
            return $this->peso;
        }
        public function getAltura(){
            return $this->altura;
        }


        #Definir métoos de asignación de datos (setters)
        public function setNombre($valor){
            $this->nombre=$valor;
        }
        public function setEdad($valor){
            $this->edad=$valor;
        }
        public function setPeso($valor){
            $this->peso=$valor;
        }
        public function setAltura($valor){
            $this->altura=$valor;
        }
        //Mëtodo de cálculo de IMC accediendo a las propiedades
        public function imc(){
            return $this->peso/($this->altura*$this->altura);
        }
        public function imc2(){
            return $this->getPeso()/($this->getAltura()*$this->getAltura());
        }
        public function iniciaBD($usuario,$password,$servidor,$bd){  #Conexión con la BD
            try{
                $this->mbd = new PDO("mysql:host={$servidor};dbname={$bd}",$usuario,$password);
                $this->mbd-> exec("set names utf8");#Con esta linea se valida reconocer los caracteres especiales
            }catch(PDOException $e){
                echo "Error-PDO: ".$e->getMessage()."<br>";
                die();
            }
        }
        public function guardabd(){#Función que inserta los datos a la bd
            $imc=$this->imc();#Algo muy importante a resaltar es que la función bindParam no acepta como parámetro una función, así que fue necesario asignar el valor de retorno a una variable antes de pasarla a bindParam
            $query=$this->mbd->prepare('INSERT INTO datos(nombre,edad,altura,peso,imc)VALUES(:nombre,:edad,:altura,:peso,:imc)');
            $query->bindParam(':nombre',$this->nombre,PDO::PARAM_STR);
            $query->bindParam(':edad',$this->edad,PDO::PARAM_STR);
            $query->bindParam(':altura',$this->altura,PDO::PARAM_STR);
            $query->bindParam(':peso',$this->peso,PDO::PARAM_STR);
            $query->bindParam(':imc',$imc,PDO::PARAM_STR); 
            $query->execute();
        }  
    }

?>