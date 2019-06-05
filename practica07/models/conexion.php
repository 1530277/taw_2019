<?php

class Conexion{

	public function conectar(){
    try{
      $link = new PDO("mysql:host=localhost;dbname=tutorias","1530277","Holamundo11");
      $link -> exec("set names utf8");
      return $link;
    }catch(PDOException $e){
       echo "<br><br>PDO-error: $e<br>";  
    }
	}

}

?>