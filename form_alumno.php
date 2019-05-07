<?php
    #Clases de objetos
    class bd{
        private $mbd;
        public function bd($usuario,$password,$servidor,$bd){   
            try{
                $this->mbd = new PDO("mysql:host={$servidor};dbname={$bd}",$usuario,$password);
                $this->mbd-> exec("set names utf8");#Con esta linea se valida reconocer los caracteres especiales
            }catch(PDOException $e){
                echo "Error-PDO: ".$e->getMessage()."<br>";
                die();
            }
        }
        public function agregar_alummno($alumno){
            #matricula, nombre carrera email y teléfono.
            $query=$this->mbd->prepare('INSERT INTO alumnos(nombre,paterno,materno,matricula,carrera,correo,telefono) 
                                        VALUES(:nombre,:paterno,:materno,:matricula,:carrera,:correo,:telefono)');
            $query->bindParam(':nombre',$alumno->nombre,PDO::PARAM_STR);
            $query->bindParam(':paterno',$alumno->paterno,PDO::PARAM_STR);
            $query->bindParam(':materno',$alumno->materno,PDO::PARAM_STR);
            $query->bindParam(':matricula',$alumno->matricula,PDO::PARAM_STR);
            $query->bindParam(':carrera',$alumno->carrera,PDO::PARAM_STR);
            $query->bindParam(':correo',$alumno->correo,PDO::PARAM_STR);
            $query->bindParam(':telefono',$alumno->telefono,PDO::PARAM_STR);
            $query->execute();
        }
        public function agregar_maestro($maestro){
            $query=$this->mbd->prepare('INSERT INTO maestros(nombre,paterno,materno,no_empleado,telefono,carrera) 
                                        VALUES(:nombre,:paterno,:materno,:no_empleado,:telefono,:carrera)');
            $query->bindParam(':nombre',$maestro->nombre,PDO::PARAM_STR);
            $query->bindParam(':paterno',$maaestro->paterno,PDO::PARAM_STR);
            $query->bindParam(':materno',$maestro->materno,PDO::PARAM_STR);
            $query->bindParam(':no_empleado',$maestro->no_empleado,PDO::PARAM_STR);
            $query->bindParam(':carrera',$maestro->carrera,PDO::PARAM_STR);
            $query->bindParam(':telefono',$maestro->telefono,PDO::PARAM_STR);
            $query->execute();            
        }
    }
    class alumno{
        public $nombre;
        public $paterno;
        public $materno;
        public $matricula;
        public $correo;
        public $telefono;
        public $carrera;
        
        public function alumno($_nombre,$_paterno,$_materno,$_matricula,$_correo,$_telefono,$_carrera){
            $this->nombre=$_nombre;
            $this->paterno=$_paterno;
            $this->materno=$_materno;
            $this->matricula=$_matricula;
            $this->correo=$_correo;
            $this->telefono=$_telefono;
            $this->carrera=$_carrera;
        }
    }
    class maestro{#no. empleado, carrera, nombre, teléfono.
        public $nombre;
        public $paterno;
        public $materno;
        public $no_empleado;
        public $telefono;
        public $carrera;
        
        public function maestro($_nombre,$_paterno,$_materno,$_noempleado,$_telefono,$_carrera){
            $this->nombre=$_nombre;
            $this->paterno=$_paterno;
            $this->materno=$_materno;
            $this->no_empleado=$_noempleado;
            $this->telefono=$_telefono;
            $this->carrera=$carrera;
        }
    }
?>

<?php
    #Valida clic y guarda datos
     if(isset($_POST['btn_save'])){
        $alumno = new alumno($_POST['nombre'],$_POST['paterno'],$_POST['materno'],
        $_POST['matricula'],$_POST['correo'],$_POST['telefono'],$_POST['carrera']);
        $obj_bd = new bd("root","","localhost","practica_2");
        $obj_bd->agregar_alummno($alumno);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno</title>
    <style>
        form{
            max-width:300px;
            margin:10px auto;
            border: 2px solid blue;
            border-radius:10px;
        }
        label,input{
            margin:10px 30px;
            text-align:center;
        }
        input[type="submit"]{
            width:200px;
            height:30px;
            border-radius:4px;
            display:inline-block;
            text-align:center;
        }
        input[type="submit"]:hover{
            background-color:green;
            color:white;
            border:1px solid green;
        }

    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="matricula">Matrícula:</label>
        <input type="text" required name="matricula" id="matricula">
        <label for="nombre">Nombre:</label>
        <input type="text" required name="nombre" id="nombre">
        <label for="paterno">Apellido paterno:</label>
        <input type="text" required name="paterno" id="paterno">
        <label for="materno">Apellido materno:</label>
        <input type="text" required name="materno" id="materno">
        <label for="telefono">Teléfono de casa o celular:</label>
        <input type="text" required name="telefono" id="telefono">
        <label for="carrera">Carrera:</label>
        <input type="text" required name="carrera" id="carrera">
        <label for="correo">Correo:</label>
        <input type="email" required name="correo" id="correo">
        <input type="submit" name="btn_save" value="Gurdar">
    </form>
</body>
</html>