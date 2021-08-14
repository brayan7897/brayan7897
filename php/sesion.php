<?php
    session_start();
    require 'database.php';

    $idusuario = $_SESSION["id"];

    $stmt = "SELECT * FROM venta WHERE codigo_usu ='$idusuario'";
    $query = mysqli_query($conn, $stmt);
    $nr = mysqli_num_rows($query);

    while($fila = mysqli_fetch_array($query)){
            $codigoA[] = $fila["codigo_arti"];
            $tipo = $fila["tipo"];
            $precio[] = $fila["precio"];
            $fecha[] = $fila["fecha"];
            $tipoaux[]=$fila["tipo"];

            if($tipo==1){
              $datos = datosArticulo1($conn, $fila["codigo_arti"]);
              $nombreA[] = $datos[0];
              $imgA[] = "articulos/".$datos[1];
              $descripcion[] = $datos[2];
            }
            if($tipo==2){
              $nombreA[] = datosArticulo2($conn, $fila["codigo_arti"]);
              $imgA[] = "imagenes/mcompra1.png";
              $descripcion[] = "titulo con caciones de nuestro albun canciones5";
            }
      }

    function datosArticulo1($conn, $usuario){

        $stmt = "SELECT * FROM merch WHERE codigo_merch='$usuario'";
        $query = mysqli_query($conn, $stmt);
        $nr = mysqli_num_rows($query);

        if($nr==1){
            while($fila = mysqli_fetch_array($query)){
              $datoA[] = $fila["nombre_merch"];
              $datoA[] = $fila["img"];
              $datoA[] = $fila["descripcion_merch"];
          }
        }
        return $datoA;
    }
    function datosArticulo2($conn, $usuario){
      $stmt = "SELECT * FROM lista WHERE codigo_lista='$usuario'";
        $query = mysqli_query($conn, $stmt);
        $nr = mysqli_num_rows($query);

        if($nr==1){
            while($fila = mysqli_fetch_array($query)){
              $nombrea = $fila["nombre_lista"];
          }
        }
      return $nombrea;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>16 Bits</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bevan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="../css/sesion.css">
    <link rel="stylesheet" href="../css/sesion1.css">
    <link rel="stylesheet" href="../css/sesion2.css">
    <link rel="stylesheet" href="../css/sesion3.css">
    <link rel="stylesheet" href="../css/sesion4.css">
    <link rel="stylesheet" href="../css/reproductor.css">

</head>
<body onload="cargarid()">
    <header class="header">
        <div class="logo-nav-container">
            <a href="#" class="logo"><img src="../imagenes/logo1.png" alt=""></a>
            <nav class="navigation">
                <ul>
                    <li><a href="#" id="sect1" class="sect1">Inicio</a></li>
                    <li><a href="#seccion2" id="sect2" class="sect2">Musica</a></li>
                    <li><a href="#seccion3" id="sect3" class="sect3">Eventos</a></li>
                    <li><a href="#seccion4" id="sect4" class="sect4">Store</a></li>
                </ul>
             </nav>
             <a href="#" id=<?php echo $_SESSION["id"] ?> class="sesionbt" alt="">
               <div class="nombre_usu"><?php echo $_SESSION["nombre"]?></div>
               <div class="img_usu">
                 <img src=<?php echo "../usuarios/".$_SESSION["img"]?> alt="">
                </div>
              </a>
        </div>_
    </header>
    <div class="seccion1" id="seccion1">
      <div class="intro">
      <iframe width="639" height="362" src="https://www.youtube.com/embed/WCxYSNZH01M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div class="musicbox" id="musicbox">
          <div class="pmusic" id="pmusic">
            <img src="../imagenes/misca1.png" alt=""> 
            <div>

            </div>
          </div>
          <div class="pmusic" id="pmusic"><img src="../imagenes/musica2.png" alt=""></div>
          <div class="pmusic" id="pmusic"><img src="../imagenes/musica3.png" alt=""></div>
        </div>
      </div>
      <div class="compras">
          <h1>Tus compras</h1>
          <div class="box_compras">
            <?php 
              for($i=0;$i<$nr;$i++){
                echo "<div class='compra'><div class='compra_img' id='".$codigoA[$i].".".$tipoaux[$i].".".$nombreA[$i]."'><img src='../".$imgA[$i]."' alt=''></div>
                <div class='datos_compra'> 
                  <div class='title-compra'>".$nombreA[$i]."</div>
                  <div class='des-compra'>".$descripcion[$i]."</div>
                  <div class='fecha-arti'>".$fecha[$i]."</div></div></div>";
              }
            ?>
          </div>
      </div>
    </div>
    </div>
    <div class="seccion2" id="seccion2">
      <h1>Nuestra musica</h1>
      <div class="listmusic_box" id="listmusic_box">

      </div>
    </div>
    <div class="seccion3" id="seccion3">
      <div class="event-box">
        <div class="event">
          <img src="../imagenes/evento1.png" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="../imagenes/evento2.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="../imagenes/evento3.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="../imagenes/evento4.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="../imagenes/evento5.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="../imagenes/evento6.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="../imagenes/evento7.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="seccion4" id="seccion4">
      <div class="store_music-box" id="store_music-box">
        
      </div>
      <div class="store_arti-box" id="store_arti-box">
        
      </div>
    </div>
    <div class="reproductor" id="reproductor">
        <div class="player">
            <div class="player__controls">
              <div class="player__btn player__btn--small" id="previous">
                <i class="fas fa-arrow-left"></i>
              </div>
              <h5 class="player__title">playing now</h5>
              <div class="player__btn player__btn--small" id="icon-menu">
                <i class="fas fa-bars"></i>
              </div>
            </div>
            <div class="player__album">
              <img src="https://i.ibb.co/ZS3wRSh/cover.jpg" alt="Album Cover" class="player__img" loading="lazy" />
            </div>
       
            <h2 class="player__artist">Disclosure</h2>
            <h3 class="player__song">Latch</h3>
       
            <input type="range" value="20" min="0" class="player__level" id="range" />
            <div class="audio-duration">
              <div class="start">00:01</div>
              <div class="end">04:30</div>
            </div>
       
            <audio class="player__audio" controls id="audio">
              <source src="music/prueba.mp3" type="audio/mpeg" />
            </audio>
       
            <div class="player__controls">
              <div class="player__btn player__btn--medium" id="backward">
                <i class="fas fa-backward"></i>
              </div>
       
              <div class="player__btn player__btn--medium blue play" id="play">
                <i class="fas fa-play play-btn"></i>
                <i class="fas fa-pause pause-btn hide"></i>
              </div>
       
              <div class="player__btn player__btn--medium" id="forward">
                <i class="fas fa-forward"></i>
              </div>
            </div>
          </div>
    </div>

    <div class="modal-articulo" id="modal-articulo">
      <div class='close-modal'><img src='../imagenes/close1.png' alt=''></div>
      
    </div>

    <Script src="https://code.jquery.com/jquery-3.6.0.min.js"></Script>
    <script src="../js/api.js"></script>
    <script src="../js/hover.js"></script>
    <script src="../js/listas_sesion.js"></script>
    <script src="../js/merchSesion.js"></script>
    <script src="../js/storesc.js"></script>
    <script src="../js/cargarCompras.js"></script>
</body>
</html>
