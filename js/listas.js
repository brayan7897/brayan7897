$(document).ready(function()
{
    CargarList();

    function CargarList(){
        let accion = "lista";
        $.ajax({
            url: "php/EjecutarQuery.php?accion="+accion,
            type: "POST",
            success:function(dato)
            {
                rows = JSON.parse(dato);
                let i=0;

                while(i<rows.length){
                    nombre=rows[i].nombre_lista;
                    list=rows[i].codigo_lista;
                    CargarCan(list, nombre);
                    i++;
                }
            }
        });
    }
    function CargarCan(lista, nombre){
        let accion = "mostrar";
        $.ajax({
            url: "php/EjecutarQuery.php?ListaID="+lista+"&accion="+accion,
            type: "POST",
            success:function(dato)
            {
                rows = JSON.parse(dato);
                let i=0;
                $('#listmusic_box').append("<div class='titlelist'>"+nombre+"</div>");
                while(i<rows.length){
                    $('#listmusic_box').append("<div class='music'><button class='btmusic'> <img src='imagenes/play20x201.svg' alt=''></button> <div class='nombre_music'>"+rows[i].nombre_musica+"</div></div>");
                    i++;
                }
            }
        });
    }

});