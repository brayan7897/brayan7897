<?php
    session_start();
    require 'database.php';
    $codigo; $img;

    $nombre = $_POST['usuario-l'];
    $password = $_POST['password-l'];

    $stmt = "SELECT codigo_usu, nombre_usu, contraseña_usu, img FROM usuario WHERE nombre_usu='".$nombre."' && contraseña_usu='".$password."'";
    $query = mysqli_query($conn, $stmt);
    $nr = mysqli_num_rows($query);
    if($nr == 1){
        while($fila = mysqli_fetch_array($query)){
            $codigo = $fila["codigo_usu"];
            $img = $fila["img"];
        }
        $_SESSION["id"] = $codigo;
        $_SESSION["nombre"] = $nombre;

        if($img!=null){
            $_SESSION["img"] = $img;
        }else{
            $_SESSION["img"] = "img_sesion.png";
        }
        
        header("Location:sesion.php");
    }else if($nombre=='admin' && $password=='123456'){
        $_SESSION["id"] = "admin";
        header("Location:admin.php");
    }else{

        echo "error";
    }
?>
