<?php
    session_start();
    date_default_timezone_set("America/Lima");
    
    function Gcodigo(){
        $Acodigo = date("y").date("m").date("H").date("s");
        $codigo =(int)$Acodigo;
        return $codigo;
    }
    
    require 'database.php';

    $correo = $_POST['correo-r'];
    $nombre = $_POST['usuario-r'];
    $password = $_POST['password-r'];

    $codigoG = Gcodigo();

    if(!empty($correo) && !empty($nombre) && !empty($password)){
        $sql = "INSERT INTO usuario (codigo_usu,correo_usu,nombre_usu,contraseña_usu) VALUES ('$codigoG','$correo','$nombre','$password')";
        $resultado = mysqli_query($conn, $sql);

        if(!$resultado){
            echo "error";
        }else{
            $_SESSION["id"] = $codigoG;
            $_SESSION["nombre"] = $nombre;
            header("Location:sesion.php");
        }
        mysqli_close($conn);
    }
?>