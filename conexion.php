<?php 
include_once("clasUsuario.php");
if( isset($_POST['documento']) && $_POST['nombre'] && $_POST['fecha_nac'] && $_POST['clave'] ){
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha_nac'];
    $clave = $_POST['clave'];
    if(usuario::retornarDato(5,$documento) > "0"){
        usuario::actualizarUsuarios($documento,$nombre,$fecha,$clave);
        header("location:consultar.php");
    }else{
        if( usuario::registrarUsuario($documento,$nombre,$fecha,$clave) == 1 ){
            header("location:consultar.php");
        }else{
            echo "Erro 405";
        }
    }
    
}else{
    echo "Ingresa los datos antes";
}