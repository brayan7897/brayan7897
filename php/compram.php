<?php
    session_start();
    require 'database.php';

    if(isset($_GET["id"])){

    $codigo = $_GET["id"];

    $idusuario = $_SESSION["id"];

    $stmt1 = "SELECT * FROM lista WHERE codigo_lista ='$codigo'";
    $query1 = mysqli_query($conn, $stmt1);
    $nr1 = mysqli_num_rows($query1);

    if($nr1==1){
        while($fila1 = mysqli_fetch_array($query1)){
            $nombre_lista = $fila1["nombre_lista"];
        }
    }

    $stmt = "SELECT codigo_musica, musica.codigo_lista, nombre_musica,  size_musica FROM musica, lista WHERE musica.codigo_lista = '$codigo' AND lista.codigo_lista = '$codigo'";
    $query = mysqli_query($conn, $stmt);
    $nr = mysqli_num_rows($query);

    while($fila = mysqli_fetch_array($query)){
            $nombre[] = $fila["nombre_musica"];
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

    <link rel="stylesheet" href="../css/compram.css">
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
        <div class="youtuve-container">
            <img class="yout-logo" src="../imagenes/youtube-logo.png" alt=""> <a class="title-canal" href="https://www.youtube.com/channel/UCT4tZptyeYz1Ndq-FLQqBYQ">16BITS</a>
            <div class="video-yout">
            <iframe width=100% height=100% src="https://www.youtube.com/embed/R_QLySBbn9E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="datos-container">
            <div class="title_arti"><?php echo $nombre_lista?></div>
            <div class="line"></div>
            <div class="precio_arti">s/.10</div>
            <div class="des_arti">
            <?php 
                for( $i=0;$i<count($nombre); $i++){
                    echo "<div class='music'><button class='btmusic'><img src='../imagenes/play20x201.svg' alt=''></button><div class='nombre_music'>".$nombre[$i]."</div></div>";
                }     
            ?>
            </div>
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
                    <div class="datos-pago">
                        <h2 style="margin: 10px;">Datos pago</h2>
                        <p class="title-dato">Numero de tarjeta</p>
                        <input class="texto-dato" type="number" placeholder="1234 4567 8910 1112">
                        <p class="title-dato">fecha expiracion</p>
                        <input class="texto-dato" type="text" placeholder="mm/aa">
                        <p class="title-dato">CCV</p>
                        <input class="texto-dato" type="number" placeholder="123" min="100" max="999">

                        <input type="text" name="idarticulo" value=<?php echo $codigo ?> style="display: none;">
                        <input type="text" name="idusuario" value=<?php echo $idusuario ?> style="display: none;">
                        <input type="text" name="particulo" value="10" style="display: none;">
                        <input type="text" name="tipo" value="2" style="display: none;">
                    </div>
                    <div class="datos-articulo">
                        <div class="img-artic">
                            <img src=<?php echo "../imagenes/music2.png"?> alt="">
                        </div>
                        <div class="narticulo"><?php echo $nombre_lista?></div>
                        <textarea class="des-artic" name="" id="" cols="30" rows="10" readonly="readonly"><?php echo "titulo con caciones de nuestro albun ".$nombre_lista?></textarea>
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