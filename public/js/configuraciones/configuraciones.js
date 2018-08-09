$('#configuraciones').click(function(){

    // $.ajax({

    //     url:url,
    //     type:'GET',
    //     data:{
    //       canal:canal
    //     },
    //     dataType:'json',
    //     success:function(respuesta){

        $( "#modal_configuraciones" ).addClass( "show" );

        $("#modal_configuraciones").css({
            "display": "block",
            "padding-right": "16px",
            "padding-top": "16px",
            "background": "rgba(0, 0, 0, 0.5)"
            });

            $( "#cerrar_modal_configuraciones" ).click(function() { 
      
                  $( "vendedor" ).removeClass( "show" );
                  $("#modal_configuraciones").css({
                   "display": "none"
                  });         
              });
            return false;
        // }
    //   }) 
})





$('#guardar_modal_configuraciones').click(function(){

    var dias_mora=$('#dias_mora').val();
    var tipo_facturas=$('#tipo_facturas').val();
    var rango1=$('.irs-from').html();
    var rango2=$('.irs-to').html();

    // var rango1=rango1.substr(1);
    // var rango2=rango2.substr(1);

    tipo_facturas=tipo_facturas.toUpperCase(); 

    console.log(tipo_facturas);
    console.log(dias_mora);

    if(dias_mora=="" || tipo_facturas==""){
    alertify.error("TODOS LOS CAMPOS SON OBLIGATORIOS");
    return false; 
    }

    var url = getAbsolutePath() + 'guardar_configuraciones';    

    $.ajax({

        url:url,
        type:'GET',
        data:{
            dias_mora:dias_mora,
            tipo_facturas:tipo_facturas
        },
        dataType:'json',
        success:function(respuesta){

                  $( "vendedor" ).removeClass( "show" );
                  $("#modal_configuraciones").css({
                   "display": "none"
                  });         
            return false;
        }
      }) 
})