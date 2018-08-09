$('#clientes_tabla').on('click', '.cliente_modal', function (event) {
    var valores=[];
    $(this).parents("tr").find("td").each(function() {
      var celda = $(this).html() + "\n";
      valores.push(celda);
    });
   
      // var id_cliente = this.name;  
      var nittri=(valores[1]);
      
    //   return false;
      var url = getAbsolutePath() + 'select_facturas';
  
      $.ajax({
  
        url:url,
        type:'GET',
        data:{
            nittri:nittri
        },
        dataType:'json',
        success:function(respuesta){
          // alert(respuesta);
          $('#select_facturas').html(respuesta);
        }
      });
    })