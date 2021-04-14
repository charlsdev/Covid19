<select multiple name="Q3" id="Q3" required class="form-control col-md-6">
                                 <?php 
                                    if (!$con)
                                    {
                                       die("Conexion fallida: " . mysqli_connect_error());
                                    }
                                    
                                    $sql = "SELECT * FROM provinciascontagios";
                                    $result = mysqli_query($con, $sql);
                                 ?>

                                 <option disabled selected value="">Seleccionar más de una opción...</! -->

                                 <?php
                                    while ($ver = mysqli_fetch_assoc($result))
                                    {
                                       ?>
                                       <option value="<?=$ver["ProvinciaContagios"]?>">
                                          <?= utf8_encode($ver["ProvinciaContagios"])?> 
                                       </option>
                                       <?php
                                    }
                                 ?>
                                 
                              </select>
							  
							  
					
https://www.google.com/search?q=Insert+Value+From+radiobuttons+In+Database+(MySQL)+In+PHP&oq=Insert+Value+From+radiobuttons+In+Database+(MySQL)+In+PHP&aqs=chrome..69i57.5614j0j7&sourceid=chrome&ie=UTF-8#kpvalbx=_Pa-OXsqEIeqIgge8xbP4AQ25
https://www.c-sharpcorner.com/UploadFile/051e29/insert-value-from-checkbox-in-database-mysql-in-php/
https://www.anerbarrena.com/value-radio-button-jquery-checked-1580/
https://www.youtube.com/watch?v=cgvJFs1Qu1Q

getCurrentPosition() and watchPosition() no longer work on insecure origins. To use this feature, you should consider switching your application to a secure origin, such as HTTPS. See https://goo.gl/rStTGz for more details.


// $sql = "SELECT ID FROM encuesta ORDER BY ID DESC LIMIT 1";
   // $resultado = mysqli_query($con, $sql);

   // $row = mysqli_fetch_array($resultado);
   // $maxcodigo = $row['ID'];

   // if ($maxcodigo < 9) {
   //    $maxcodigo = $maxcodigo + 1;
   //    $CodigoGEN = 'ENC000' . $maxcodigo;
   // } else {
   //    if ($maxcodigo < 99) {
   //       $maxcodigo = $maxcodigo + 1;
   //       $CodigoGEN = 'ENC00' . $maxcodigo;
   //    } else {
   //       if ($maxcodigo < 999) {
   //          $maxcodigo = $maxcodigo + 1;
   //          $CodigoGEN = 'ENC0' . $maxcodigo;
   //       } else {
   //          if ($maxcodigo < 9999) {
   //             $maxcodigo = $maxcodigo + 1;
   //             $CodigoGEN = 'ENC' . $maxcodigo;
   //          } else {
   //             $CodigoGEN = "Maximo de registro alcanzado";
   //          }
   //       }
         
   //    }
   // }

   // mysqli_free_result($resultado);

   // echo $CodigoGEN . " ";

   //Determinamos la zona horaria
   // date_default_timezone_set('America/Guayaquil');
   //Hora del servidor...
   // echo date('d/m/Y H:i:s');
   
   
   
                                 <!-- Checkbox forma -->
                                 <!-- <div class="custom-control custom-checkbox">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" class="custom-control-input" name="Q3[]" id="Guayas" value="Guayas">
                                    <label class="custom-control-label" for="Guayas">Guayas</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" class="custom-control-input" name="Q3[]" id="Pichincha" value="Pichincha">
                                    <label class="custom-control-label" for="Pichincha">Pichincha</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" class="custom-control-input" name="Q3[]" id="Los Rios" value="Los Rios">
                                    <label class="custom-control-label" for="Los Rios">Los Rios</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" class="custom-control-input" name="Q3[]" id="Azuay" value="Azuay">
                                    <label class="custom-control-label" for="Azuay">Azuay</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" class="custom-control-input" name="Q3[]" id="Manabi" value="Manabi">
                                    <label class="custom-control-label" for="Manabi">Manabi</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" class="custom-control-input" name="Q3[]" id="Ninguna" value="Ninguna">
                                    <label class="custom-control-label" for="Ninguna">Ninguna</label>
                                 </div> -->

                                 <!-- Pruebas mostrar -->
                                 <!-- <br><div >Ids seleccionados en matriz <span id="arr"></span></div>
                                 <div >Ids seleccionados <span id="str"></span></div> -->

