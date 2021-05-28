//script3.js

$(document).ready(function(){

    var dataTable = $('#car').DataTable({
     "language": {
     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
     },
     "processing" : true,
     "serverSide" : true,
     "order" : [],
     "ajax" : {
      url:"http://lhol-itp-sd-02.epizy.com/datos2.php",
      type:"POST"
     }
    });
   
    $('#car').on('draw.dt', function(){
   
     $('#car').Tabledit({
      url:'http://lhol-itp-sd-02.epizy.com/edicion2.php.php',
      dataType:'json',
      columns:{
       identifier : [0, 'idcar'],
       editable:[[1, 'id'], [2, 'modelo'], [3, 'marca']]
      },
   
   
      
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#' + data.idp).remove();
        $('#car').DataTable().ajax.reload();
       }
      }
     });
   
   
    });
   
    });  
   
   $(document).on('click', '#js-enviar2', function(e){
       e.preventDefault();
   
       var nom = $("#id").val();
       var ap = $("#modelo").val();
       var carg = $("#marca").val();
   
       $.ajax({
           method: 'POST',
           dataType: "html",
           url: "http://lhol-itp-sd-02.epizy.com/insertRegister2.php",
           data: "id="+nom+"&modelo="+ap+"&marca="+carg,
           success: function(r){
               if (r == '200') { // Si el php anterior, imprimió 200
                   $('#estado').html('<hr><p>Datos guardados correctamente.</p><hr>');
               } else {
                   $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
               }
           }
       });
       
       $('#car').DataTable().ajax.reload();
   
   });
