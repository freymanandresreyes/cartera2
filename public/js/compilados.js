//captura la direccion del servidor
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
  }
  var URLdominio = getAbsolutePath();
$('#crear_area').click(function()
{
    var lider=$('#lider').val();
    var area=$('#area').val();
    var url = URLdominio+'crear_area';
    
    area=area.toUpperCase();

    if(lider==0 || area=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
              lider: lider,
              area: area
            },
            dataType: 'json',
            success: function(respuesta){
            if(respuesta==0)
            {
                alertify.error("ESTE LIDER YA TIENE UN AREA ASIGNADA.");
            }
            else if(respuesta==1)
            {
                alertify.success("AREA CREADA CON EXITO.");
                setTimeout("location.href='areas'");
            }
            }//fin del success
          });//fin de ajax 
    }
});
// alert("ok");
$(function() {
    $(document).on('click', 'input[type="button"]', function(event) {
       let id = this.id;
       var url= URLdominio+'editar_area';
      
       $.ajax({
    
        url: url,
        type: 'GET',
        data: {
          id : id
        },
        dataType: 'json',
        success: function(respuesta){
          $('#form').html(respuesta);

            $( "#editar_area" ).addClass( "show" );

            $("#editar_area").css({
            "display": "block",
            "padding-right": "16px",
            "background": "rgba(0, 0, 0, 0.5)"
            });


            $( "#cerrar_editar" ).click(function() {
            $( "cerrar_editar" ).removeClass( "show" );
            $("#editar_area").css({
              "display": "none"
            });
            });
        }
      });//FIN AJAX
     });
   });
$('#guardareditar').click(function()
{
    var nombre_area=$('#nombre_area').attr('name');
    var nuevo_nombre=$('#nombre_area').val();
    var encargado=$('#encargado').val();
    var url = URLdominio+'guardar_editar';
    
    nombre_area=nombre_area.toUpperCase();
    
    if(encargado==0 || nombre_area=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
        $.ajax({
    
            url: url,
            type: 'GET',
            data: {
              nombre_area : nombre_area,
              nuevo_nombre : nuevo_nombre,
              encargado : encargado
            },
            dataType: 'json',
            success: function(respuesta){
              if(respuesta==0)
            {
                alertify.error("ESTE LIDER YA TIENE UN AREA ASIGNADA.");
            }
            else if(respuesta==1)
            {
                alertify.success("ACTUALIZACION REALIZADA CON EXITO.");
                setTimeout("location.href='areas'");
            }
            }
          });//FIN AJAX
    }
});
$('#quitar_area').click(function()
{
    var lider_area=$('#lider_area').val();
    var area_lider=$('#area_lider').val();
    var id_area=$('#area_lider').attr('name');
    var url = URLdominio+'quitar_area';

    if(lider_area==0 || area_lider=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
              lider_area : lider_area,
              id_area : id_area
            },
            dataType: 'json',
            success: function(respuesta){
              if(respuesta==1)
              {
                alertify.success("AREA QUITADA CON EXITO.");
                setTimeout("location.href='areas'");
              }
            }
          });//FIN AJAX
    }
});
$('#lider_area').click(function()
{
    var lider_area=$('#lider_area').val();
    var url = URLdominio+'buscar_area_lider';

    console.log(lider_area);

    $.ajax({
        url: url,
        type: 'GET',
        data: {
          lider_area : lider_area
        },
        dataType: 'json',
        success: function(respuesta){
          if(respuesta=="")
        {
            $('#area_lider').val(respuesta);
        }
        else
        {
            $('#quitar').html(respuesta);
        }
        }
      });//FIN AJAX
});
$("#abrir_estados").click(function(e) {

  $("#estados").addClass("show");

  $("#estados").css({
    display: "block",
    "padding-right": "16px",
    background: "rgba(0, 0, 0, 0.5)"
  });

  $("#cerrar_estados").click(function() {
    $("#cerrar_estados").removeClass("show");
    $("#estados").css({
      display: "none"
    });
  });
  e.preventDefault();
});

$("#guardar_estados").click(function() 
{

    var nuevo_estado=$('#nombre_estado').val();
    nuevo_estado=nuevo_estado.toUpperCase();
    var url = URLdominio+'nuevo_estado';

    $.ajax({
    
        url: url,
        type: 'GET',
        data: {
            nuevo_estado : nuevo_estado
        },
        dataType: 'json',
        success: function(respuesta){
        if(respuesta==1)
        {
            alertify.success("ESTADO GUARDADO CON EXITO.");
            setTimeout("location.href='areas'");
        }
        if(respuesta==0)
        {
            alertify.error("YA EXISTE UN ESTADO CON ESTE NOMBRE.");
        }
        }
      });//FIN AJAX
});
$("#editar_estado").click(function(e) {

    var url = URLdominio+'listar_estados';

    $.ajax({
    
        url: url,
        type: 'GET',
        data: {
            
        },
        dataType: 'json',
        success: function(respuesta){
            $('#estado_seleccionado').html(respuesta);
        }
      });//FIN AJAX


    $("#ver_estados").addClass("show");
  
    $("#ver_estados").css({
      display: "block",
      "padding-right": "16px",
      background: "rgba(0, 0, 0, 0.5)"
    });
  
    $("#cerrar_editar_estados").click(function() {
      $("#cerrar_editar_estados").removeClass("show");
      $("#ver_estados").css({
        display: "none"
      });
    });
    e.preventDefault();
  });
  
$("#estado_seleccionado").click(function() {

    var estado=$('#estado_seleccionado').val();
    var url = URLdominio+'llenar_input';
    console.log(estado);
    $.ajax({
    
        url: url,
        type: 'GET',
        data: {
            estado : estado
        },
        dataType: 'json',
        success: function(respuesta){
            $('#input').html(respuesta);
        }
      });//FIN AJAX
  });
$("#guardar_editar_estados").click(function() {

    var id_estado=$('#estado_seleccionado').val();
    var editar_estado=$('#estado_editado').val();
    var url = URLdominio+'guardar_editar_estado';
    editar_estado=editar_estado.toUpperCase();

    if(id_estado==0 || editar_estado=="")
    {
        alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
    }
    else
    {
    $.ajax({
    
        url: url,
        type: 'GET',
        data: {

            id_estado : id_estado,
            editar_estado : editar_estado
            
        },
        dataType: 'json',
        success: function(respuesta){
            if(respuesta==1)
            {
                alertify.success("ESTADO GUARDADO CON EXITO.");
                setTimeout("location.href='areas'");
            }
            if(respuesta==0)
            {
                alertify.error("YA EXISTE UN ESTADO CON ESTE NOMBRE.");
            }
        }
      });//FIN AJAX
    }
  });
$('#crear_orden').click(function()
{
   var lider_remitente = $('#lider').val();
   var area_remitente = $('#area_remitente').val();
   var area_receptora = $('#area_receptora').val();
   var item1 = $('#item1').val();
   var item2 = $('#item2').val();

   if(area_receptora==0)
   {
    alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS.");  
   }
   console.log(item1.toUpperCase());
});