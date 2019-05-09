<?php
    class Database{
        #Declara variables
        private $con;
        private $dbhost="localhost";
        private $dbuser="root";
        private $dbpass="";
        private $dbname="tuto_poo";
        
        #Define funciones
        public function connect_bd(){
            $this->con=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$thiss->dbname);
            if(mysqli_connect_error()){
                die("Conexión a la base de datos falló ".mysqli_connect_error().mysqli_connect_errorno());
            }
        }
        public function sanitize($var){
            $return = mysqli_real_
        }
    }

?>