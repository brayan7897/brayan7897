<?php
    session_start();
    require 'database.php';

    $idusuario = $_SESSION["id"];

    if(isset($_GET["id"])){

    $codigo = $_GET["id"];

    $nombre;
    $img;
    $precio;

    $stmt = "SELECT * FROM merch WHERE codigo_merch ='$codigo'";
    $query = mysqli_query($conn, $stmt);
    $nr = mysqli_num_rows($query);

        if($nr == 1){
        while($fila = mysqli_fetch_array($query)){
            $nombre = $fila["nombre_merch"];
            $descripcion = $fila["descripcion_merch"];
            $img = $fila["img"];
            $precio = $fila["precio"];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/compra.css">
</head>
<body>
    <div class="logo-nav-container">
        <a href="#" class="logo"><img src="../imagenes/logo1.png" alt=""></a>
            <nav class="navigation">
            <div class="title">Articulo</div>
            </nav>
    </div>
    <div class="img-container">
        <div class="rectangulo"></div>
        <img class="arti_img" src=<?php echo "../articulos/".$img?> alt="">
        <div class="datos-container">
            <div class="title_arti"><?php echo $nombre?></div>
            <div class="line"></div>
            <textarea class="des_arti" readonly="readonly"><?php echo $descripcion?>
            </textarea>
            <div class="compra-btn">Añadir compra</div>
            <div class="line"></div>
        </div>
    </div>

    <div class="redes">
        <a href="">
            <img src="../imagenes/facebook.png" alt=""> 
        </a>
        <a href="">
            <img src="../imagenes/twitter.png" alt=""> 
        </a>
        <a href="">
            <img src="../imagenes/spotify.png" alt="">
        </a>
    </div>

    <div class="modal-venta">
        <div class="close-modal"><img src="../imagenes/close.png" alt=""></div>
        <div class="header-venta"> 
            <div class="tventa">Form de compra articulos</div> 
            <div class="line2"></div>
            <form class="form-ventas" id="registrar-venta" method="POST">
                <div class="container-datos">
                    <div class="datos-envio">
                        <h2 style="margin: 10px;">Datos envio</h2>
                        <p class="title-dato">Nombre Completo</p>
                        <input class="texto-dato" name="nombrecom" type="text" required>
                        <p class="title-dato">Numero de telefono</p>
                        <input class="texto-dato" name="telefono" type="text" required>
                        <p class="title-dato">Direccion</p>
                        <input class="texto-dato" name="direccion" type="text" required>
                        <p class="title-dato">Ciudad, provincia, region</p>
                        <input class="texto-dato" name="region" type="text" required>
                        <p class="title-dato">Codigo postal</p>
                        <input class="texto-dato" name="postal" type="text" required>
                        <input type="text" name="idarticulo" value=<?php echo $codigo ?> style="display: none;">
                        <input type="text" name="idusuario" value=<?php echo $idusuario ?> style="display: none;">
                        <input type="text" name="particulo" value=<?php echo $precio ?> style="display: none;">
                        <input type="text" name="tipo" value="1" style="display: none;">
                    </div>
                    <div class="datos-pago">
                        <h2 style="margin: 10px;">Datos pago</h2>
                        <p class="title-dato">Numero de tarjeta</p>
                        <input class="texto-dato" type="number" placeholder="1234 4567 8910 1112" required>
                        <p class="title-dato">fecha expiracion</p>
                        <input class="texto-dato" type="text" placeholder="mm/aa" required>
                        <p class="title-dato">CCV</p>
                        <input class="texto-dato" type="number" placeholder="123" min="100" max="999" required>
                    </div>
                    <div class="datos-articulo">
                        <div class="img-artic">
                            <img src=<?php echo "../articulos/".$img?> alt="">
                        </div>
                        <div class="narticulo"><?php echo $nombre?></div>
                        <textarea class="des-artic" cols="30" rows="10" readonly="readonly"><?php echo $descripcion?></textarea>
                    </div>
                </div>
                <div class="foot-venta"><div class="line3"></div> <div><button class="enviarbt" type="submit">Realizar compra</button></div></div>
            </form>
        </div>
    </div>
    
    <Script src="https://code.jquery.com/jquery-3.6.0.min.js"></Script>
    <script src="../js/conModal.js"></script>
</body>
</html>