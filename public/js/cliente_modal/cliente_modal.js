$('#clientes_tabla').on('click', '.cliente_modal', function (event) {
  var valores=[];
  $(this).parents("tr").find("td").each(function() {
    var celda = $(this).html() + "\n";
    valores.push(celda);
  });
 
    // var id_cliente = this.name;  
    var variable=(valores[1]);

    var url3 = getAbsolutePath() + 'tabla_modal';

    $.ajax({

      url:url3,
      type:'GET',
      data:{
        variable:variable
      },
      dataType:'json',
      success:function(respuesta){
        $('#cuerpo_tabla').html(respuesta);
      }
    });




    var url = getAbsolutePath() + 'consulta_canales';

      $.ajax({

        url:url,
        type:'GET',
        data:{
          
        },
        dataType:'json',
        success:function(respuesta){
          // alert(respuesta);
        $('#canales_modal').html(respuesta);

        }
      });

      
      var url2 = getAbsolutePath() + 'consulta_parametros';

      $.ajax({

        url:url2,
        type:'GET',
        data:{
          
        },
        dataType:'json',
        success:function(respuesta){
        $('#parametros').html(respuesta);

        $( "#cliente" ).addClass( "show" );

        $('#example23').DataTable({
          retrieve: true,
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });

        $("#cliente").css({
        "display": "block",
        "padding-right": "16px",
        "padding-top": "16px",
        "background": "rgba(0, 0, 0, 0.5)"
        });

        $('#canales').val(respuesta);
        $('#cliente_nombre').html(valores[4]);
        $('#id_nit').val(valores[1]);       
        $('#telefono_cliente').html(valores[6]);
    
        $("#menu_ocultar").css({
          "display": "none"          
        });

        $("#body_modal").css({
          "width": "100%",
        });

        $( "#cerrar_modal_vendedor" ).click(function() {

          $('#id_nit').val("");          
          $('#parametros').val("");
          $('#observaciones').val("");
          $('#canales_modal').val("");
          $('#select_facturas').val("");
          $('#acuerdo').val("");
          $('#cliente_nombre').val("");
          $('#telefono_cliente').val("");
          

            $( "vendedor" ).removeClass( "show" );
            $("#cliente").css({
             "display": "none"
            });    
        });
        }
      })  
  });