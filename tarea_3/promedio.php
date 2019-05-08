<?php
    class taw_class{
        private $nombre;
        private $calificaciones;
        private $promedio;        
        public function taw_class(){
            $this->nombre="";
            $this->promedio=0;
            $this->calificaciones=[];
        }
        public function getUnidad1(){
            return $this->calificaciones[0];
        }
        public function getUnidad2(){
            return $this->calificaciones[1];
        }
        public function getUnidad3(){
            return $this->calificaciones[2];
        }
        public function getPromedio(){
            return $this->promedio;
        }
        public function setNombre($val){
            $this->nombre=$val;
        }
        public function setUnidad1($val){
            $this->calificaciones[0]=$val;
        }
        public function setUnidad2($val){
            $this->calificaciones[1]=$val;
        }
        public function setUnidad3($val){
            $this->calificaciones[2]=$val;
        }
        public function setPromedio(){
            if($this->calificaciones[0]>=70&&$this->calificaciones[1]>=70&&$this->calificaciones[2]>=70){
                for($i=0;$i<count($this->calificaciones);$i++)
                    $this->promedio+=$this->calificaciones[$i];
                $this->promedio=$this->promedio/3;
            }else{
                $this->promedio=60;
            }
        }
        public function show_datos(){
            echo "<br>DATOS:";
            echo "<br>Nombre: $this->nombre<br>";
            /* 
                Existen 3 caminos, cuando cada una de las unidades es la mayor de las 3, así que cada
                if de los siguientes representa cada camino
            */
            //Cuanndo la unidad 1 fue la mayor o igual de todas
            if($this->calificaciones[0]>=$this->calificaciones[1]&&$this->calificaciones[0]>=$this->calificaciones[2]){
                echo "unidad 1: ". $this->calificaciones[0]."<br>";
                if($this->calificaciones[1]>=$this->calificaciones[2]){
                    echo "unidad 2: ". $this->calificaciones[1]."<br>";
                    echo "unidad 3: ". $this->calificaciones[2]."<br>";
                }else{
                    echo "unidad 3: ". $this->calificaciones[2]."<br>";
                    echo "unidad 2: ". $this->calificaciones[1]."<br>";
                }
            }
            //Cuando la unidad 2 fue la mayor o igual de todas
            if($this->calificaciones[1]>=$this->calificaciones[0]&&$this->calificaciones[1]>=$this->calificaciones[2]){
                echo "unidad 2: ".$this->calificaciones[1]."<br>";
                if($this->calificaciones[0]>=$this->calificaciones[2]){
                    echo "unidad 1: ".$this->calificaciones[0]."<br>";
                    echo "unidad 3: ".$this->calificaciones[2]."<br>";
                }else{
                    echo "unidad 3: ".$this->calificaciones[2]."<br>";
                    echo "unidad 1: ".$this->calificaciones[0]."<br>";
                }
            }
            //Cuando la unidad 3 fue la mayor o igual de todas
            if($this->calificaciones[2]>=$this->calificaciones[1]&&$this->calificaciones[2]>=$this->calificaciones[1]){
                echo "<br>unidad 3: ".$this->calificaciones[2]."<br>";
                if($this->calificaciones[1]>=$this->calificaciones[0]){
                    echo "unidad 2: ".$this->calificaciones[1]."<br>";
                    echo "unidad 1: ".$this->calificaciones[0]."<br>";
                }else{
                    echo "unidad 1: ".$this->calificaciones[0]."<br>";
                    echo "unidad 2: ".$this->calificaciones[1]."<br>";
                }
            }
            //Por último se imprime el promedio
            echo "<br>promedio: $this->promedio<br><br>";
        }
    }

?>