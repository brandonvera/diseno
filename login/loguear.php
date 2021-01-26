<?php 
    require 'conexion.php';
    session_start();

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $q = "SELECT count(*) as contar from usuarios where usuario = '$usuario' and clave = '$clave' ";
    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);

    if($array['contar'] > 0){
        $_SESSION['username'] = $usuario;
        header("location: ../../paginaprincipal.php");
    }else{
        header("location: ../../index.html");
    }

?>