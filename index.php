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
    
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles1.css">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="stylesheet" href="css/styles3.css">
    <link rel="stylesheet" href="css/styles4.css">
    <link rel="stylesheet" href="css/reproductor.css">

</head>
<body>
    <header class="header">
        <div class="logo-nav-container">
            <a href="#" class="logo"><img src="imagenes/logo1.png" alt=""></a>
            <nav class="navigation">
                <ul>
                    <li><a href="#" id="sect1" class="sect1">Inicio</a></li>
                    <li><a href="#seccion2" id="sect2" class="sect2">Musica</a></li>
                    <li><a href="#seccion3" id="sect3" class="sect3">Eventos</a></li>
                    <li><a href="#seccion4" id="sect4" class="sect4">Store</a></li>
                </ul>
             </nav>
             <div><a href="php/login.php" id="loginbt" class="loginbt" alt=""> login <img src="imgproyecto/user20x20.svg" alt=""></a></div>
        </div>
    </header>
    <div class="seccion1" id="seccion1">
      <div class="intro">
        <div class="bits_info">
          <div class="title_16bits">16Bits</div>
          <div class="info_text"><p>16 Bits es una banda que se desarrolla dentro del pop punk e 
            indie rock con influencias de rock japonés. Sus 
            canciones giran en torno a temas sobre el amor trágico, 
            amistad y videojuegos. Entre los integrantes se encuentran: 
            André Alfaro, Alonso Castillo, Giancarlo Díaz, Mateo Novoa y Kevin Pantoja
          </p></div>
        </div>
        <img src="imagenes/intro.png" alt="">
      </div>
      <div class="musicbox" id="musicbox">
        <div class="pmusic" id="pmusic"><img src="imagenes/misca1.png" alt=""></div>
        <div class="pmusic" id="pmusic"><img src="imagenes/musica2.png" alt=""></div>
        <div class="pmusic" id="pmusic"><img src="imagenes/musica3.png" alt=""></div>
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
          <img src="imagenes/evento1.png" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="imagenes/evento2.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="imagenes/evento3.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="imagenes/evento4.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="imagenes/evento5.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="imagenes/evento6.jpg" alt="" class="event_img">
          <div class="event_hover">
            <h2 class="event_title">Evento</h2>
          </div>
        </div>
        <div class="event">
          <img src="imagenes/evento7.jpg" alt="" class="event_img">
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
              <img src="imagenes/musica2.png" alt="Album Cover" class="player__img" loading="lazy" />
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
    <!--
      <div class="chat">
        <div class="btn-flotante"><img src="imagenes/chat.svg"></div>
        <div class="chatbot-box">
            <div id="chatList">
                <ul>

                </ul>
            </div>
            <div class="message-box-wrap">
                <div class="message-box" id="message-box">
                    <input id = "texto"type="text">
                </div>
                <button id="send">></button>
            </div>
        </div>
    </div>
    -->
    <Script src="https://code.jquery.com/jquery-3.6.0.min.js"></Script>
    <script src="js/api.js"></script>
    <script src="js/api2.js"></script>
    <script src="js/reproductor.js"></script>
    <script src="js/listas.js"></script>
    <script src="js/mechInicio.js"></script>
</body>
</html>
