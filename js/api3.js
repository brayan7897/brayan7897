$(document).ready(function(){
    $('.crear_lista').click(function(event){
        $('.modal_lista').css("transform", "translateY(0)");
    });

    $('.cerrar_lista').click(function(event){
        $('.modal_lista').css("transform", "translateY(-200%)");
    });

})