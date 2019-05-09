<?php
    //incluir la clase
    include_once('persona.php');

    //asignar valores a las propiedades del objeto
    if(isset($_POST['btn_save'])){   
        //instanciar la clase
        $persona = new persona();
        $persona->setNombre($_POST['nombre']);
        $persona->setEdad($_POST['edad']);
        $persona->setAltura($_POST['altura']);
        $persona->setPeso($_POST['peso']);
        $persona->iniciaBD("root","","localhost","practica_2");
        $persona->guardabd();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Persona</title>
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
        <label for="nombre">Nombre:</label>
        <input type="text" required name="nombre" id="nombre" value="<?php if(isset($persona))echo $persona->getNombre(); ?>">
        <label for="edad">Edad:</label>
        <input type="text" required name="edad" id="edad" value="<?php if(isset($persona))echo $persona->getEdad(); ?>">
        <label for="peso">Peso:</label>
        <input type="text" required name="peso" id="peso" value="<?php if(isset($persona))echo $persona->getPeso(); ?>">
        <label for="altura">Altura:</label>
        <input type="text" required name="altura" id="altura" value="<?php if(isset($persona))echo $persona->getAltura(); ?>">
        <input type="submit" name="btn_save" value="Gurdar">
    </form>
    <section>
        <?php 
            if(isset($_POST['btn_save'])){
                //impresiones de los resultados
                echo "<br><br>Datos:";
                echo "<br>Nombre: $persona->nombre";
                echo "<br>Edad: $persona->edad";
                echo "<br>Altura: $persona->altura";
                echo "<br>Peso: $persona->peso";
                echo "<br>IMC: ".$persona->imc();
            }
        ?>
    </section>
</body>
</html>