function cargarid(){
    $(".title_arti").click(function(){
        let id = ""+this.id;
        window.location.href = "../php/compra.php?id="+id;
    })

    $(".title_arti_music").click(function(){
        let id = ""+this.id;
        window.location.href = "../php/compram.php?id="+id;
    })

    $(".compra_img").click(function(){
        let id = ""+this.id;
        
        var arrayDeCadenas = id.split(".");

        if(arrayDeCadenas[1]=="2"){
            CargarCanlista(arrayDeCadenas[0], arrayDeCadenas[2]);
        }

        $('.modal-articulo').css({
            "transform" : "translateY(0%)"
          });
    })
    $(".close-modal").click(function(){
        $('.modal-articulo').css({
        "transform" : "translateY(-200%)"
        });
        $('.modal-articulo').html("");
    });
}

function CargarCanlista(lista, nombre){

    let accion = "mostrar";

    $.ajax({
        url: "../php/EjecutarQuery.php?ListaID="+lista+"&accion="+accion,
        type: "POST",
        success:function(dato)
        {
            rows = JSON.parse(dato);
            let i=0;

            $("#modal-articulo").append("<div class='img_compra'><img src='../imagenes/gifcompra.gif' alt=''></div><div class='archivos-compra'><div class='title_compra'>"+nombre+"</div><div class='line3'></div><div class='container_can' id='container_can'></div></div>")

            while(i<rows.length){
                $('#container_can').append("<div class='cancion'><button class='btcancion'><a href='../audio/"+rows[i].nombre_musica+"' download='"+rows[i].nombre_musica+"'><img src='../imagenes/download-button.png'></a></button> <div class='nombre_cancion'>"+rows[i].nombre_musica+"</div></div>");
                i++;
            }
        }
    });
}

function cargarnombrelista(codigo){
    let accion = "lista";
    let nombre="";
    $.ajax({
        url: "../php/EjecutarQuery.php?accion="+accion,
        type: "POST",
        success:function(dato)
        {
            rows = JSON.parse(dato);
            let i=0;

            while(i<rows.length){
                if(codigo==rows[i].codigo_lista){
                    nombre = rows[i].nombre_lista;
                }
                i++;
            }
        }
    });
    return nombre;
}