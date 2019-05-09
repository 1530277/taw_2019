<?php
    include "promedio.php";
    $array_taw=[];
    for($i=0;$i<10;$i++){
        $taw = new taw_class();
        $taw->setNombre('Luis $i');
        $taw->setUnidad1(rand(0,100));
        $taw->setUnidad2(rand(0,100));
        $taw->setUnidad3(rand(0,100));
        $taw->setPromedio();
        $taw->show_datos();
        $array_taw[$i]=$taw;
    }

    for($i=0;$i<count($array_taw);$i++){
        for($j=0;$j<count($array_taw);$j++){
            if($array_taw[$j]->getPromedio()<$array_taw[$j+1]->getPromedio()){
                $temp=$array_taw[$j];
                
            }
        }
    }
?>