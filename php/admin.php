<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bevan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/reproductor.css">

</head>
<body>
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
             <a href="#" id="sesionbt" class="sesionbt" alt="">
               <div class="nombre_usu">brayan7897</div>
               <div class="img_usu">
                 <img src="../imagenes/img_sesion.png" alt="">
                </div>
              </a>
        </div>
    </header>
    <div class="seccion1">
        <form accept-charset="utf-8" method="POST" id="Registrar" enctype="multipart/form-data">
            <div class="registrar">
                <label>
                    Seleccionar canciones
                    <input type="file" multiple name="files[]" accept="audio/*" id="Cancion" style="display: none;">
                </label>
            </div>
            <div class="previ_canciones" id="previ_canciones">

            </div>
            <select name="lista" id="lista" class="lista" value> <option value>Selecionar lista</option> </select>
            <div class="crear_lista" id="crear_lista">+añadir</div>
           
            <button type="submit" class="create_lista" id="create_lista">crear lista</button>
        </form>

        <form id="regisMerch" class="form-merch" method="POST">
          <div class="container-register-merch">
            <div class="previ_merch">
                <div class="articulo">
                  <img class="arti_img" src="../articulos/articulo1.jpg" alt="">
                  <div class="datos_arti">
                    <div class="precio_arti" id="precio_previ">S/40.00</div>
                  <h2 class="title_arti" id="title_previ">16 Bits – Perdoname Yoshi</h2>
                  <p class="des_arti"  id="des_previ">Incluye camiseta, sticker vinil adhesibo
                    Tallas : S-M-L-XL</p>
                  </div>
                </div>
            </div>
            <div class="datos_merch">
              <h2>Datos articulo</h2>
              <input type="text" name="nombre_merch" id="nombre_merch" placeholder="Nombre" class="d_merch">
              <input type="number" name="precio_merch" id="precio_merch" placeholder="Precio" class="d_merch">
              <textarea name="descri_merch" id="descri_merch" placeholder="Descripcion" class="des_merch"></textarea>
              <input type="file" name="file" class="file_merch" id="img_arti">
              <div class="previ_arti" id="previ_arti">Previsualizar</div>
              <button type="submit" id="create_arti" class="create_arti">Crear articulo</button>
            </div>
          </div>
        </form>
    </div>
    <div class="seccion2">
        
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
              <source src="../music/prueba.mp3" type="audio/mpeg" />
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

    <div class="modal_lista">
        <div class="ax">Ingrese Titulo de la lista</div> <button class="cerrar_lista">X</button>
        <input type="text" class="titulo_lista" id="titulo_lista">
        <button class="guardar_lista" id="guardar_lista">Guardar</button>
    </div>

    <Script src="https://code.jquery.com/jquery-3.6.0.min.js"></Script>
    <script src="../js/api3.js"></script>
    <script src="../js/canciones.js"></script>
    <script src="../js/previArti.js"></script>
    <script src="../js/articulo.js"></script>
</body>
</html>