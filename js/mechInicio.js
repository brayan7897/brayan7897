$(document).ready(function()
{
    CargarMerch();
    CargarMusicArti();

    function CargarMerch(){
        let accion = "mostrarmerch";
        $.ajax({
            url: "php/EjecutarQuery.php?accion="+accion,
            type: "POST",
            success:function(dato)
            {
                rows = JSON.parse(dato);
                let i=0;

                while(i<rows.length){
                    $('#store_arti-box').append("<div class='articulo' name><img class='arti_img' src='articulos/"+rows[i].img+"' alt=''>"+
                            "<div class='datos_arti'><div class='ex_arti'><div class='precio_arti'>S/"+rows[i].precio+"</div>"+
                            "</div><h2 class='title_arti' id='"+rows[i].codigo_merch+"'>"+rows[i].nombre_merch+"</h2><p class='des_arti'>"+rows[i].descripcion_merch+"</p>"+
                            "</div></div>");
                    i++;
                }
            }
        });
    }
    function CargarMusicArti(){
        let accion = "lista";
        $.ajax({
            url: "php/EjecutarQuery.php?accion="+accion,
            type: "POST",
            success:function(dato){
                rows = JSON.parse(dato);
                let i=0;
                let o=0;

                while(i<rows.length){

                    if(o<3){
                        o++;
                    }else{
                        o=1;
                    }

                    $('#store_music-box').append("<div class='articulo' name><img class='arti_img' src='imagenes/music"+o+".png' alt=''>"+
                            "<div class='datos_arti'><div class='ex_arti'><div class='precio_arti'>S/.10</div>"+
                            "</div><h2 class='title_arti_music' id='"+rows[i].codigo_lista+"'>"+rows[i].nombre_lista+"</h2><p class='des_arti'>titulo con caciones de nuestro albun "+rows[i].nombre_lista+"</p>"+
                            "</div></div>");
                    i++;
                }
            }
        });
    }
});