let obtener_pixeles_inicio = () => document.documentElement.scrollTop || document.body.scrollTop;

$('#reproductor').css("background-color", "#F8EAEA");
/*$('#sect1').css({"border":"4px solid #29E7C4","box-shadow":"0px 15px 20px #29E7C4","transform":"translateY(-7px)"});*/
/*caja1.style.cssText('background-color: black; color: white;');*/

let indicarScroll = () => {
    let alto = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let avance_scroll = (obtener_pixeles_inicio()/alto)*100;
    if(avance_scroll<25&&avance_scroll>=0){
        $('#reproductor').css("background-color", "#F8EAEA");

        $('#sect1').css("border","4px solid #262E4D");
        $('#sect2').css("border","none");
        $('#sect3').css("border","none");
        $('#sect4').css("border","none");

        $('.navigation').css({"width": "50%","background-color":"#FFFFFF","height": "1.5rem","padding":"0.8rem 0","border-radius": "5px"});
    }else if(avance_scroll<50&&avance_scroll>24){
        $('#reproductor').css("background-color", "#8E2142");

        $('#sect1').css("border","none");
        $('#sect2').css("border","4px solid #8E2142");
        $('#sect3').css("border","none");
        $('#sect4').css("border","none");

        $('.navigation').css({"width": "50%","background-color":"#FFFFFF","height": "1.5rem","padding":"0.8rem 0","border-radius": "5px"});
    }else if(avance_scroll<75&&avance_scroll>49){
        $('#reproductor').css("background-color", "#C5B2B2");

        $('#sect1').css("border","none");
        $('#sect2').css("border","none");
        $('#sect3').css("border","4px solid #262E4D");
        $('#sect4').css("border","none");
        $('.navigation').css({"width": "50%","background-color":"#ffffff","height": "1.5rem","padding":"0.8rem 0","border-radius": "5px"});

    }else if(avance_scroll<100&&avance_scroll>74){
        $('#reproductor').css("background-color", "#E5E5E5");

        $('#sect1').css("border","none");
        $('#sect2').css("border","none");
        $('#sect3').css("border","none");
        $('#sect4').css("border","4px solid #8E2142");

        $('.navigation').css({"width": "50%","background-color":"#FFFFFF","height": "1.5rem","padding":"0.8rem 0","border-radius": "5px"});
    }
}

window.addEventListener('scroll',indicarScroll);

