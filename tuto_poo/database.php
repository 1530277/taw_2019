<?php
    class Database{
        #Declara variables
        private $con;
        private $dbhost="localhost";
        private $dbuser="root";
        private $dbpass="";
        private $dbname="tuto_poo";
        public function __construct(){#método constructor de la clase donde se ejecuta la función que realiza la conexión
            $this->connect_bd();
        }
        #Define funciones
        public function connect_bd(){#Genera una conexión con la base de datos
            $this->con=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
            if(mysqli_connect_error()){
                die("Conexión a la base de datos falló ".mysqli_connect_error().mysqli_connect_errorno());
            }
        }
        public function valida_usuario($username,$password){#Retorna consulta de una fila que coincida con los datos, de no existir retorna un arreglo vacío
            $sql="SELECT*FROM usuarios WHERE username='$username' AND `password` ='$password'";
            $res=mysqli_query($this->con,$sql);
            $return = mysqli_fetch_object($res);
            return $return;
        }
        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con,$var);
            return $return;
        }
        public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico){#inserta nuevo registro a la tabla clientes
            $sql = "INSERT INTO `clientes`(nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
            $res=mysqli_query($this->con,$sql);
            if($res)
                return true;
            else
                return false;
        }
        public function read(){#Retorna un objeto mysqli que debe ser recorrido y convertido a un arreglo php, eso se hace en el archivo index.php en las primeras lineas
            $sql = "SELECT * FROM clientes";
            $res = mysqli_query($this->con,$sql);
            return $res;
        }
        public function single_record($id){#Consulta una fila en específico de la tabla clientes
            $sql = "SELECT * FROM clientes where id='$id'";
            $res = mysqli_query($this->con,$sql);
            $return = mysqli_fetch_object($res);
            return $return;
        }
        public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id){#actualiza un registro en específico en función del id recibido de parámetro
            $sql = "UPDATE clientes SET nombres='$nombres',apellidos='$apellidos', telefono='$telefono',direccion='$direccion', correo_electronico='$correo_electronico' WHERE id=$id";
            $res = mysqli_query($this->con,$sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }
        public function delete($id){#funcion para borrar una fila en específico en función del id recibido como parámetro
            $sql = "DELETE FROM clientes WHERE id=$id";
            $res = mysqli_query($this->con,$sql);
            if($res){
                return true;
            }else{
                return false;
            }
        }
    }

?>