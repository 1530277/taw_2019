<<<<<<< HEAD
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

=======
<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=tutorias","root","");
		$link -> exec("set names utf8");
		return $link;

	}

}

>>>>>>> 9a22a42dd416e4a3a61d0cfb64a6ca14b9af70d6
?>