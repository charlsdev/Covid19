//Solo numeros
function numeros(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789";
	especiales = [8];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial) 
	return false;
}

//Telefono
function numerosTEL(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789-()";
	especiales = [8];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial) 
	return false;
}

//Coordenadas
function Coordenadas(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789-.";
	especiales = [8];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial) 
	return false;
}

//Solo letras
function letra(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "abcdefghijklmnopqrstuvwxyz";
	especiales = [8, 32];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

//Numeros y letras
function dir(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789abcdefghijklmnopqrstuvwxyz";
	especiales = [8, 32, 46];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
			tecla_especial = true;
			break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

//Validar cedula
function validar(cad) {
   var total = 0;
   var longitud = cad.length;
   var longcheck = longitud - 1;

   if (cad !== "" && longitud === 10){
      for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
            var aux = cad.charAt(i) * 2;
            if (aux > 9) aux -= 9;
            total += aux;
         } else {
            total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
         }
      }

      // console.log(total);
      
      total = total % 10 ? 10 - total % 10 : 0;
      // console.log(total);
      
      if (cad.charAt(longitud-1) == total) {
         Swal.fire({
            icon: 'success',
            title: 'Cedula Válida',
            text: 'Ahora verificaremos su registro...',
            allowOutsideClick: false
			})
			document.getElementById("Enviar").disabled = true;
			$('button[type="submit"]').removeAttr('disabled');
         return document.getElementById('cedula').value = cad;
      } else {
         Swal.fire({
            icon: 'error',
            title: 'Cedula Inválida',
            text: 'Por favor proporcionar una cedula válida...',
            allowOutsideClick: false
			})
			document.getElementById('Enviar').disabled = false;
			$('button[type="submit"]').attr('disabled','disabled');
         return document.getElementById('cedula').value = "";
      }
   }
}

function Cedula(Control){
   var cad = document.getElementById('cedula').value.trim();
   var longitud = cad.length;
   if(longitud === 10){
      Control.value = validar(Control.value);
   } else {
		document.getElementById('Enviar').disabled = false;
		$('button[type="submit"]').attr('disabled','disabled');
	}
}