// JavaScript Document
function geoloc() {
   // d = document.getElementById("geo");
   if (navigator.geolocation){
      // d.innerHTML="<p>Tu dispositivo soporta la geolocalización.</p>";
      // Swal.fire({
      //    title: 'Geolocalización',
      //    text: 'Tu dispositivo soporta la geolocalización!',
      //    icon: 'success'
      // })
      navigator.geolocation.getCurrentPosition(showPosition,showError);
      
   }
   else {
      // d.innerHTML="<p>Lo sentimos, tu dispositivo no admite la geolocaización.</p>";
      Swal.fire({
         title: 'Geolocalización',
         text: 'Lo sentimos, tu dispositivo no admite la geolocaización. Debe de rellenar los campos de manera manual.',
         icon: 'info'
      })
      // $("#latitud").removeAttr('disabled');
      // $("#longitud").removeAttr('disabled');
      $("#latitud").focus();
   }
}

function showPosition(position) {
   latitud = position.coords.latitude;
   longitud = position.coords.longitude;
   // d.innerHTML+="<p>Latitud: "+latitud+"</p>";
   // d.innerHTML+="<p>Longitud: "+longitud+"</p>";
   var latitud = latitud.toFixed(5);
   var longitud = longitud.toFixed(5);
   $("#latitud").val(latitud);
   $("#longitud").val(longitud);
   Swal.fire({
      title: 'Geolocalización',
      text: 'Localización encontrada!',
      icon: 'success'
   })
   // $("#latitud").attr('disabled','disabled');
   // $("#longitud").attr('disabled','disabled');
   // latlon = latitud+","+longitud;
   // var img_url="http://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=350x250&sensor=false";
   // d.innerHTML+="<img src='"+img_url+"'>";
}

function showError(error){
   switch(error.code) {
      case error.PERMISSION_DENIED:
         // d.innerHTML+="<p>El usuario ha denegado el permiso a la localización.</p>"
         Swal.fire({
            title: 'Geolocalización',
            text: 'El usuario ha denegado el permiso a la localización. Paso obligatorio para poder resgistrar su encuesta',
            icon: 'question'
         })
         // $("#latitud").removeAttr('disabled');
         // $("#longitud").removeAttr('disabled');
         $("#latitud").focus();
      break;

      case error.POSITION_UNAVAILABLE:
         // d.innerHTML+="<p>La información de la localización no está disponible.</p>"
         Swal.fire({
            title: 'Geolocalización',
            text: 'La información de la localización no está disponible. Debe de rellenar los campos de manera manual.',
            icon: 'error'
         })
         // $("#latitud").removeAttr('disabled');
         // $("#longitud").removeAttr('disabled');
         $("#latitud").focus();
      break;

      case error.TIMEOUT:
         // d.innerHTML+="<p>El tiempo de espera para buscar la localización ha expirado.</p>"
         Swal.fire({
            title: 'Geolocalización',
            text: 'El tiempo de espera para buscar la localización ha expirado. Debe de rellenar los campos de manera manual.',
            icon: 'warning'
         })
         // $("#latitud").removeAttr('disabled');
         // $("#longitud").removeAttr('disabled');
         $("#latitud").focus();
      break;

      case error.UNKNOWN_ERROR:
         // d.innerHTML+="<p>Ha ocurrido un error desconocido.</p>"
         Swal.fire({
            title: 'Geolocalización',
            text: 'El usuario ha denegado el permiso a la localización. Debe de rellenar los campos de manera manual.',
            icon: 'info'
         })
         // $("#latitud").removeAttr('disabled');
         // $("#longitud").removeAttr('disabled');
         $("#latitud").focus();
      break;
   }
}