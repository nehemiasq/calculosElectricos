<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">


</head>
<body>
    <div class="contenedor">
                
<center><h2>NUEVO POSTE</h2></center>
  
  <center>
    <div id="form_aumentarPoste"></div>
   <!-- 
  <div class="form-group">
    <label for="texto">Id Poste</label>
    <input id="idPoste" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="texto">Tipo</label>
    <input id="tipoPoste" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="Tipo de poste">
  </div>

  <div class="form-group">
    <label for="texto">Altura</label>
    <input id="alturaPoste" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="Altura de poste">
  </div>-->

  <button class="btn btn-primary" onclick="guardarPoste()">Guardar</button>

  <!--<button type="submit" class="btn btn-primary">Nuevo</button>-->

  <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
</center>

    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">


aumentarPoste(); //Creo mi método que va iniciar

function aumentarPoste(){

          $.ajax({
            url:"http://localhost/calculosElectricos/public/aumentarid",
            method:"POST", //indico que quiero traer info de la BD
            //data:{idPoste:get_id_poste},
            //data:{idPoste:var_idposte, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            dataType: "text",
       
            success:function(item) //este es el json con toda la data
            { 
              
              //var pointNum = parseFloat(text); //string y convertirlo a un número con decimales
              //var numericaInt = parseInt(cadena); string y convertirlo a entero

             var item = parseInt(item); //convirtiento de string a número

              item = item + 1;
              
              filas = "";  
              
            //declarando una variable en Jscript
                        //dibujando el formulario en JS
              
                filas += '<div class="form-group">';

                filas += '<label for="texto">Id Poste</label>';
    
                filas += '<input readonly id="idPoste" type="text" style="width : 150px; heigth : 150px" class="form-control" value="'+item+'">'; //readonly, campo no editable

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Tipo</label>';
    
                filas += '<input id="tipoPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Altura</label>';
    
                filas += '<input id="alturaPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';
                 
                                     
              $("#form_aumentarPoste").html(filas); //llamo a la variable creada
            }
              });
   }



function guardarPoste(){
  var var_idposte = $("#idPoste").val();
  var var_tipoposte = $("#tipoPoste").val();
  var var_alturaposte = $("#alturaPoste").val();


        $.ajax({
            url:"http://localhost/calculosElectricos/public/nuevoposte",
            method:"POST", //Envía la data
            data:{idPoste:var_idposte, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            dataType: "text",
           
            success:function(respuesta) //este es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              $("#idPoste").val(""); //dejando campos en blanco luego de guardar
              $("#tipoPoste").val("");
              $("#alturaPoste").val("");
              
              alert("inserción correcta!!");

              },

              error:function() //este es el json con toda la data que responde la confirmación
            {
              console.log("error");
              alert("error!!");

              }
          });
}

</script>