$(document).ready(function() {
   var opcion;
   opcion = 1;

   tableResultados = $("#listEncuestas").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "encuesta.php",
         "data": { opcion:opcion },
         // "dataSrc":""
      },
      "columns": [
         {"data": "Codigo"},
         {"data": "Cedula"},
         {"data": "apellidos_nombres"},
         {"data": "Fecha"},
         {"data": "Telefono"},
         {"defaultContent": "<center><button type='button' class='RegisterEVAL btn btn-outline-success'><i class=\"far fa-file-alt\" style=\"font-size: 18px;\"></i></button></center>"},
         {"defaultContent": "<center><button type='button' class='Resultado btn btn-outline-danger'><i class=\"far fa-file-pdf\" style=\"font-size: 18px;\"></i></button></center>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   var fila; //captura la fila
   $(document).on("click", ".RegisterEVAL", function(e){
      e.preventDefault();
      opcion = 2;

      fila = $(this).closest("tr");	        
      codigoRES = fila.find('td:eq(0)').text();
      cedulaRES = fila.find('td:eq(1)').text();

      var codigo = $.trim(codigoRES); 
      var cedula = $.trim(cedulaRES);

      $.ajax({
         url: "encuesta.php",
         type: "POST",
         datatype: "json",    
         data: { codigo:codigo, cedula:cedula, opcion:opcion },
      })
      .done(function(respuesta){
         if (respuesta == true) {
            Swal.fire({
               title: 'Diagnóstico Registrado!',
               text: "El diagnostico de este paciente ya fue registrado. Desea ver el diagnostico ?",
               icon: 'question',
               reverseButtons: true,
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Sí, Acepto »»',
               cancelButtonColor: '#d33',
               cancelButtonText: 'No, acepto !!',
               allowOutsideClick: false
            }).then((result) => {
               if (result.value) {
                  window.open('diagnostico.php?codigo='+ codigo +'&cedula='+ cedula, "_blank");
               }
            })
         } else {
            Swal.fire({
               title: 'Diagnóstico NO Registrado!',
               text: "Desea registrar el diagnostico?",
               icon: 'info',
               reverseButtons: true,
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Sí, Acepto »»',
               cancelButtonColor: '#d33',
               cancelButtonText: 'No, acepto !!',
               allowOutsideClick: false
            }).then((result) => {
               if (result.value) {
                  window.open('ficha.php?codigo='+ codigo +'&cedula='+ cedula, "_blank");
               }
            })
         }
         tableResultados.ajax.reload(null, false);
      })
      
      .fail(function(){
         console.log("Error");
      });
   });

   $(document).on("click", ".Resultado", function(e){
      e.preventDefault();
      
      fila = $(this).closest("tr");	        
      codigoRES = fila.find('td:eq(0)').text();
      cedulaRES = fila.find('td:eq(1)').text();

      var codigo = $.trim(codigoRES); 
      var cedula = $.trim(cedulaRES);

      window.open('resencuesta.php?codigo='+ codigo +'&cedula='+ cedula, "_blank");
      tableResultados.ajax.reload(null, false);
   });

});

var idioma = {
   "sProcessing":     "Procesando...",
   "sLengthMenu":     "Mostrar _MENU_ registros",
   "sZeroRecords":    "No se encontraron resultados",
   "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
   "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
   "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
   "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
   "sInfoPostFix":    "",
   "sSearch":         "Buscar:",
   "sUrl":            "",
   "sInfoThousands":  ",",
   "sLoadingRecords": "Cargando...",
   "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
   },
   "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
   },
   "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad"

   }
}