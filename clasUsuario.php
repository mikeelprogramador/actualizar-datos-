<?php

class usuario{
    public static function registrarUsuario($documento,$nombre,$fecha, $clave){
        $conexion = mysqli_connect('localhost','root','','bd_ejemplo');
        $salida = 0;
        $sql = "INSERT INTO tb_usuarios (documento, nombre, fecha_nac, contraseña) VALUES ('$documento', '$nombre', '$fecha', '$clave')";
        $consulta = $conexion->query($sql);
            if($consulta){
                $salida = 1;
            }
               return $salida;
    }

    public static function consultarUsuario(){
        $conexion = mysqli_connect('localhost','root','','bd_ejemplo');
        $salida = 0;
        $sql = "SELECT * FROM tb_usuarios";
        $consulta = $conexion->query($sql);
        while($fila=$consulta -> fetch_assoc()){
            $salida .= "<div style='background-color: yellow;'>";
            $salida .= "<h3>".$fila['documento']."</h3>";
            $salida .= "<a href='index.php?documento=".$fila['documento']."'>actualizar</a>";
            $salida .= "<h3>".$fila['nombre']."<br>";
            $salida .= "</div>";
           
        }
        return $salida;
    }

    
    
    public static function retornarDato($des,$valor){
        $salida = ""; 
        $conexion = mysqli_connect('localhost','root','','bd_ejemplo');
        if( $des == 0){
            $campo = "documento"; $tabla = "tb_usuarios";
            $busqueda = "documento";
        }
        if( $des == 1){
            $campo = "nombre"; $tabla = "tb_usuarios";
            $busqueda = "documento";
        }
        if( $des == 2){
            $campo = "fecha_nac"; $tabla = "tb_usuarios";
            $busqueda = "documento";
        }
        if( $des == 3){
            $campo = "foto"; $tabla = "tb_usuarios";
            $busqueda = "documento";
        }
        if( $des == 4){
            $campo = "contraseña"; $tabla = "tb_usuarios";
            $busqueda = "documento";
        }if( $des == 5){
            $campo = "count(*)"; $tabla = "tb_usuarios";
            $busqueda = "documento";
        }

        $sql = "select $campo  from $tabla where $busqueda = '$valor'"; 
        
        $consulta = $conexion->query($sql);
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[0];
        }
        return $salida; 
    }

    public static function actualizarUsuarios($documento,$nombre,$fecha,$contraseña){
        $salida = ""; 
        $conexion = mysqli_connect('localhost','root','','bd_ejemplo');
        $sql =" update tb_usuarios set nombre = '$nombre',";
        $sql .= "fecha_nac = '$fecha',contraseña = '$contraseña' ";
        $sql .= "where documento = '$documento' ";
        $consulta = $conexion->query($sql);
    }

}

