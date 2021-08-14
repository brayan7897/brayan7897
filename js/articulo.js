$(document).ready(function(){
    
    $("#regisMerch").on("submit", function(e){
        
        accion = "regisarti";
        var formData = new FormData(document.getElementById("regisMerch"));

        $.ajax({
            url: "../php/EjecutarQuery.php?accion="+accion,
            type: "POST",
            dataType: "HTML",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
      }).done(function(a){
        if(a==1)
        {
            alert("no se pudo registrar")
            return false;
        }
            alert("registrado con exito");

            $('#nombre_arti').text("");
            $('#precio_arti').text("");
            $('#descripcion_arti').text("");
      });
    });
});