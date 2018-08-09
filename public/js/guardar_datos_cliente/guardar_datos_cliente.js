$('#guardar_datos_cliente').click(function(){

    var cliente_nombre=document.getElementById("cliente_nombre").innerHTML;
    var telefono_cliente=document.getElementById("telefono_cliente").innerHTML;
    // var nit=document.getElementById("id_nit").innerHTML;
    var canal=$('#canales_modal').val();
    var parametro=$('#parametros').val();
    var observacion=$('#observaciones').val();
    var acuerdo=$('#acuerdo').val();
    var nit=$('#id_nit').val();
    var select_facturas=$('#select_facturas').val();

    // console.log(cliente_nombre);
    // console.log(telefono_cliente);
    // console.log(canal);
    // console.log(parametro);
    // console.log(observacion);
    // console.log(acuerdo);
    // console.log(select_facturas);
    // console.log(nit);
    

    if(canal=="" || parametro=="" || observacion=="" || nit==""){
    alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS");
    return false;       
    }

    $('#guardar_datos_cliente').prop('disabled', true);
    
    var url = getAbsolutePath() + 'guardar_datos_cliente_modal';

      $.ajax({

        url:url,
        type:'GET',
        data:{
          canal:canal,
          parametro:parametro,
          observacion:observacion,
          nit:nit,
          select_facturas:select_facturas,
          acuerdo:acuerdo,
          cliente_nombre:cliente_nombre,
          telefono_cliente:telefono_cliente,
        },
        dataType:'json',
        success:function(respuesta){

        $('#canales_modal').val("");
        $('#parametros').val("");
        $('#observaciones').val("");
        $('#select_facturas').val("");
        $('#acuerdo').val("");

        alertify.success("DATOS GUARDADOS CORRECTAMENTE");
        $('#guardar_datos_cliente').prop('disabled', false);
        
        // $('#guardar_datos_cliente').prop('disabled', false);
        // $( "vendedor" ).removeClass( "show" );
        // $("#cliente").css({
        //  "display": "none"
        // }); 
        }
      }) 
});