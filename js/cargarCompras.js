$(document).ready(function(){

    /*function CargarCompras(){

        let accion = "mostrarVentas";

        $.ajax({
            url: "../php/EjecutarQuery.php?accion="+accion,
            type: "POST",
            dataType: "HTML",
            data: formData,
            success:function(dato)
            {
                rows = JSON.parse(dato);
                let i=0;

                while(i<rows.length){
                    $('#store_arti-box').append("<div class='articulo' name><img class='arti_img' src='../articulos/"+rows[i].img+"' alt=''>"+
                            "<div class='datos_arti'><div class='ex_arti'><div class='precio_arti'>S/"+rows[i].precio+"</div>"+
                            "</div><h2 class='title_arti' id='"+rows[i].codigo_merch+"'>"+rows[i].nombre_merch+"</h2><p class='des_arti'>"+rows[i].descripcion_merch+"</p>"+
                            "</div></div>");
                    i++;
                }
            }
        });
    }*/
})