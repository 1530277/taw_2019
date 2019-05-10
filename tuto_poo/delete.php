<?php
    #este archivo recibe el id y se obtiene con el método get
    include('database.php');
    $clientes = new Database();
    $id=$_GET['id'];
    $clientes->delete($id);
    header('Location:index.php');

?>