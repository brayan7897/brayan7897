$('#previ_arti').click(function(){

    let nombre_arti = $('#nombre_merch').val();
    let precio_arti = $('#precio_merch').val();
    let des_arti = $('#descri_merch').val();
    
    $('#title_previ').text(nombre_arti);
    $('#precio_previ').text("s/" + precio_arti);
    $('#des_previ').text(des_arti);
});