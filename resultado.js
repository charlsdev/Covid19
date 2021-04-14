$(document).ready(function() {
   $("#canton").change(function () {
      $("#canton option:selected").each(function () {
         ParroquiaJ = $(this).val();
         $.post("lib/parroquias.php", { ParroquiaJ: ParroquiaJ }, function(data){
            $("#parroquia").html(data);
         });            
      });
   })

   // $("#EnviarENC").click(function(){
   $('#form').submit(function(e){
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedula = $.trim($('#cedula').val());    
      apename = $.trim($('#apename').val());    
      telefono = $.trim($('#telefono').val());                            
      edad = $.trim($('#edad').val());                            
      sexo = $.trim($('#sexo').val());                            
      nacionalidad = $.trim($('#nacionalidad').val());                            
      estado = $.trim($('#estado').val());                            
      canton = $.trim($('#canton').val());                            
      parroquia = $.trim($('#parroquia').val());
      RQ1 = $('input:radio[name=Q1]:checked').val();
      RQ2 = $('input:radio[name=Q2]:checked').val();
      
      // RQ3 = $('[name="Q3[ ]"]:checked').val();
      let RQ3 = [];
      $('[name="Q3[ ]"]:checked').each(function(){
         RQ3.push(this.value);
      });
      // console.log(RQ3);
      RQ3Q = JSON.stringify(RQ3);

      RQ4 = $('input:radio[name=Q4]:checked').val();
      RQ5 = $('input:radio[name=Q5]:checked').val();
      RQ6 = $('input:radio[name=Q6]:checked').val();
      RQ7 = $('input:radio[name=Q7]:checked').val();
      RQ8 = $('input:radio[name=Q8]:checked').val();
      RQ9 = $('input:radio[name=Q9]:checked').val();
      RQ10 = $('input:radio[name=Q10]:checked').val();
      RQ11 = $('input:radio[name=Q11]:checked').val();
      RQ12 = $('input:radio[name=Q12]:checked').val();
      RQ13 = $('input:radio[name=Q13]:checked').val();
      RQ14 = $('input:radio[name=Q14]:checked').val();
      RQ15 = $('input:radio[name=Q15]:checked').val();
      RQ16 = $('input:radio[name=Q16]:checked').val();
      RQ17 = $('input:radio[name=Q17]:checked').val();
      RQ18 = $('input:radio[name=Q18]:checked').val();
      
      // RQ19 = $('[name="Q19[ ]"]:checked').val();
      let RQ19 = [];
      $('[name="Q19[ ]"]:checked').each(function(){
         RQ19.push(this.value);
      });
      // console.log(RQ19);
      RQ19Q = JSON.stringify(RQ19);

      latitud = $.trim($('#latitud').val());
      longitud = $.trim($('#longitud').val());

      $.ajax({
         url: $(this).attr("action"),
         type: $(this).attr("method"),
         datatype: "json",
         data: { cedula:cedula, apename:apename, telefono:telefono, edad:edad, sexo:sexo, nacionalidad:nacionalidad, estado:estado, canton:canton, parroquia:parroquia, RQ1:RQ1, RQ2:RQ2, RQ3Q:RQ3Q, RQ4:RQ4, RQ5:RQ5, RQ6:RQ6, RQ7:RQ7, RQ8:RQ8, RQ9:RQ9, RQ10:RQ10, RQ11:RQ11, RQ12:RQ12, RQ13:RQ13, RQ14:RQ14, RQ15:RQ15, RQ16:RQ16, RQ17:RQ17, RQ18:RQ18, RQ19Q:RQ19Q, latitud:latitud, longitud:longitud },  
      })
      .done(function(respuesta){
         console.log(respuesta);
         if (respuesta === '1') {
            Swal.fire({
               title: 'Usuario no registrado!',
               text: "Usuario ya registró su encuesta....",
               icon: 'error',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'OK!'
            }).then((result) => {
               if (result.value) {
                  location.reload();
               }
            })
         } else {
            if (respuesta === '0') {
               Swal.fire({
                  title: 'Usuario registrado!',
                  text: "Registro añadido con exito...",
                  icon: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK!'
               }).then((result) => {
                  if (result.value) {
                     location.reload();
                  }
               })
            } else {
               if (respuesta === '3') {
                  Swal.fire({
                     title: 'Máximo alcanzado!',
                     text: "Máximo de encuestas alcanzados...",
                     icon: 'warning',
                     confirmButtonColor: '#3085d6',
                     confirmButtonText: 'OK!'
                  }).then((result) => {
                     if (result.value) {
                        location.reload();
                     }
                  })
               }
            }
         }
         
      })
      
      .fail(function(){
         console.log("Error");
      });

   });
});