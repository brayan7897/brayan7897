$(document).ready(function(){
    $('.btn-flotante').click(function(event){
        $('.chatbot-box').toggleClass('active');
    });
})

let questionFirst = "Hola, estoy para ayudarte en tus preguntas sobre nuestra banda de musica";
$('#chatList ul').append('<li class = "admin-message">'+questionFirst+'</li>');


$('#send').click(function(event){
	let questionVal = document.getElementById('texto').value;
	$("#chatList ul").append('<li class="client-message">'+questionVal+'</li>');

    let Vrespuesta = responder(questionVal);
    $('#chatList ul').append('<li class = "admin-message">'+Vrespuesta+'</li>');
    document.getElementById('texto').value="";
})

function responder(pregunta){
    let respuesta = "Solo respondo preguntas sobre nuestra banda de musica";
    if (pregunta == "hola"){
        respuesta = "hola, como estas?";
    }
    if (pregunta == "como te llamas?"){
        respuesta = "Me puedes llamar BotChat";
    }
    if (pregunta == "bien y tu?"){
        respuesta = "si yo tambien estoy bien, si deseas preguntarme algo estoy a tu servicio";
    }
    if (pregunta == "como se llama su banda?"){
        respuesta = "Por ahora no tenemos un nombre";
    }
    if (pregunta == "cuantos discos tiene la banda?"){
        respuesta = "cinco por el momento";
    }
    if(pregunta == "como se llaman los integrantes?"){
        respuesta = "son cuatro los integrantes jonny en la bateria, sack con el microfono, soe con la guitarra, freddy con el bajo";
    }
    if (pregunta == "como se llaman sus discos?"){
        respuesta = "el primero umbrella luego esta For Honor despues true life";
    }
    if (pregunta == "que genero es su musica?"){
        respuesta = "el rock ligero";
    }
    if (pregunta == "donde es su proximo concierto?"){
        respuesta = "Puedes pasarte por nuestra seccion de eventos";
    }
    if (pregunta == "Cuantos Integrantes Tiene Su Banda??"){
        respuesta = "Son cuatro integrantes";
    }

    return respuesta;
}   

