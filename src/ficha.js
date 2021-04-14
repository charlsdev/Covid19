$('#formDiagnostico').submit(function(e){  
   opcion = 3;             //Registrar Diagnóstico                       
   e.preventDefault();     //evita el comportambiento normal del submit, es decir, recarga total de la página
   codigoENC = $.trim($('#codigo').val());
   cedulaENC = $.trim($('#cedula').val());
   residenciaENC = $.trim($('#residencia').val());    
   direccionENC = $.trim($('#direccion').val());
   ocupacionENC = $.trim($('#ocupacion').val());
   afiliacionENC = $.trim($('#afiliacion').val());    
   fechaENC = $.trim($('#fecha').val());
   motivoENC = $.trim($('#motivo').val());
   enfermedadENC = $.trim($('#enfermedad').val());    
   patologicosENC = $.trim($('#patologicos').val());
   quirurgicosENC = $.trim($('#quirurgicos').val());
   alergicosENC = $.trim($('#alergicos').val());    
   habitosENC = $.trim($('#habitos').val());
   estilovidaENC = $.trim($('#estilovida').val());
   mambienteENC = $.trim($('#mambiente').val());    
   hlaboralENC = $.trim($('#hlaboral').val());
   familiaresENC = $.trim($('#familiares').val());
   descripcionENC = $.trim($('#descripcion').val());    
   resumenENC = $.trim($('#resumen').val());
   impresionENC = $.trim($('#impresion').val());
   tratamientoENC = $.trim($('#tratamiento').val());    
   observacionENC = $.trim($('#observacion').val());

   $.ajax({
         url: "encuesta.php",
         type: "POST",
         datatype: "json",    
         data: { codigoENC:codigoENC, cedulaENC:cedulaENC, residenciaENC:residenciaENC, direccionENC:direccionENC, ocupacionENC:ocupacionENC, afiliacionENC:afiliacionENC, fechaENC:fechaENC, motivoENC:motivoENC, enfermedadENC:enfermedadENC, patologicosENC:patologicosENC, quirurgicosENC:quirurgicosENC, alergicosENC:alergicosENC, habitosENC:habitosENC, estilovidaENC:estilovidaENC, mambienteENC:mambienteENC, hlaboralENC:hlaboralENC, familiaresENC:familiaresENC, descripcionENC:descripcionENC, resumenENC:resumenENC, impresionENC:impresionENC, tratamientoENC:tratamientoENC, observacionENC:observacionENC, opcion:opcion },
      })
      .done(function(respuesta){
         if (respuesta == false) {
            Swal.fire({
               title: 'Diagnostico no registrado!',
               text: "Upss! Error al registrar el diagnostico...",
               icon: 'error',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'OK!'
            }).then((result) => {
               if (result.value) {
                  location.reload();
               }
            })
            
         } else {
            Swal.fire({
               title: 'Diagnostico registrado!',
               text: "Diagnostico añadido con exito...",
               icon: 'success',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'OK!'
            }).then((result) => {
               if (result.value) {
                  location.reload();
               }
            })
            
         }
      })
      
      .fail(function(){
         console.log("Error");
      });											     			
});