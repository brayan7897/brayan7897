$(document).ready(function()
{
    var list="";
    var CantidadArchivos=0;
    var song;
    var i=0;

    cargarListas();
   
   $('#Cancion').on('change', function(e){
    
       song=e.target.files;
       if(song){

          CantidadArchivos = song.length;
          if(CantidadArchivos>10)
          {
            alert("Error. Has seleccionado mas de 10 canciones");
            return;
          }
          if(CantidadArchivos<1)
          {
            alert("Error. debes seleccionar un archivo audio/mp3 para poder realizar un registro.");
            return;
          }

          $('#Maximo').html("<br>Cantidad de archivos seleccionados: "+ CantidadArchivos);
         
           while(i<song.length)
          {
              list+=  "<div class='cancion_' id='cancion_"+i+"'>"+song[i].name+"</div>";
            i++;
          }

             $('.previ_canciones').html(list);
              
             i=0;
           list="";
       }
       else {
        $('.previ_canciones').html("<div class='cancion_'> seleccione almenos un cancion<div>");
       }
     
     });


     $("#Registrar").on("submit", function(e){
          e.preventDefault();

          listaID=  $('#lista').val();
          accion =  "registrar";
        
          ca=CantidadArchivos;
          var formData = new FormData(document.getElementById("Registrar"));
        
              $.ajax({
                    url: "../php/EjecutarQuery.php?ListaID="+listaID+"&accion="+accion+"&CantidadA="+ca,
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
                    list="";
                    CantidadArchivos=0;
                    song="";
                    
              }).fail(function(d){
                  alert("no se pudo registrar 2");
              });
    });

    $('#guardar_lista').click(function(){
          accion="addLista";
          var lista=$('#titulo_lista').val();

          if(lista==""){
            alert("Ingrese lista");
            return;
          }
           $.ajax({
                    url: "../php/EjecutarQuery.php?accion="+accion+"&lista="+lista,
                    type: "POST",
                    dataType: "HTML",
                    data: "",
                    cache: false,
                    contentType: false,
                    processData: false
              }).done(function(a){

                alert("LISTA REGISTRADA EXITOSAMENTE");
                   
                $('#nombreLista').val("");

                   cargarListas();

              }).fail(function(a){                  
                 alert(a);
              });
    });

    function cargarListas()
    {
        var accion ="lista";

        $.ajax({
            url: "../php/EjecutarQuery.php?accion="+accion,
            type: "POST",
            success:function(dato)
            {
              rows = JSON.parse(dato);
                     
              var cont="";
              var i=0;
              cont+="<option value=''>Selecionar lista</option>";
              while(i<rows.length)
              {
                  cont+="<option value='"+rows[i].codigo_lista+"'>"+rows[i].nombre_lista + " </option>";
                  i++;
              }
              $('#lista').html(cont);
            }
        });
    }
});