<?php
    class persona{
        public $nombre;
        public $edad;

  #      public function persona($_nombre,$_edad){//Método constructor
   #         $this->nombre=$_nombre;
    #        $this->edad=$_edad;
     #   }
        public function mostrar_datos(){
            echo "<br>Nombre: $this->nombre, edad: $this->edad<br><br>";
        }
    }

#    $persona_1 = new persona("Luis",22);
 #   $persona_1->mostrar_datos();

    $persona_2 = new persona();#Constructor sin recibir parámetros
    $persona_2->nombre="Luis";
    $persona_2->edad=22;
    $persona_2->mostrar_datos();
?>