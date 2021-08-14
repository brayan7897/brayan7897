$(document).ready(function(){
    
    $('.compra-btn').click(function(event){
        $('.modal-venta').css("transform", "translateX(0)");
    });

    $('.close-modal').click(function(event){
        $('.modal-venta').css("transform", "translateX(-250%)");
    });

    $("#registrar-venta").on("submit", function(e){
        e.preventDefault();

        accion =  "addVenta";
      
        var formData = new FormData(document.getElementById("registrar-venta"));
      
            $.ajax({
                  url: "../php/EjecutarQuery.php?accion="+accion,
                  type: "POST",
                  dataType: "HTML",
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false
            }).done(function(a){

                alert("compra registrada correctamente");
                window.location.href = "../php/sesion.php";

            }).fail(function(d){
                alert("no se pudo registrar");
            });
  });
})