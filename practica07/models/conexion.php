<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=tutorias","1530277","Holamundo11");
		$link -> exec("set names utf8");
		return $link;

	}

}

?>