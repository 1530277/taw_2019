<?php
    include "promedio.php";
    for($i=0;$i<10;$i++){
        $taw = new taw_class();
        $taw->setNombre('Luis $i');
        $taw->setUnidad1(rand(0,100));
        $taw->setUnidad2(rand(0,100));
        $taw->setUnidad3(rand(0,100));
        $taw->setPromedio();
        $taw->show_datos();
    }
?>