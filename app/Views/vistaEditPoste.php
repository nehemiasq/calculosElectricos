<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">


</head>
<body>
    <div class="contenedor">
                
<center><h2>EDITAR POSTE</h2></center>
  <input type="text" id="get_id_poste" value="<?php echo $_GET["id"]; ?>"> </input>
  <center>
    <div id="form_editarPoste"></div>
  <!--<div class="form-group"> código hidden=> permite ocultar
    <label for="texto">Id Poste</label>
    <input id="idPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">
  </div>

  <div class="form-group">
    <label for="texto">Tipo</label>
    <input id="tipoPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">
  </div>

  <div class="form-group">
    <label for="texto">Altura</label>
    <input id="alturaPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">
  </div>-

  <button class="btn btn-primary" onclick="updatePoste()">Modificar</button>

  <a href="<?php //echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>-->
  
  <button class="btn btn-primary" onclick="updatePoste()">Modificar</button>

  <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
</center>

</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

editarPoste(); //Creo mi método

function editarPoste(){

 //var get_id_poste =  $("#get_id_poste").val();
  var var_idposte = $("#idPoste").val();
  var var_tipoposte = $("#tipoPoste").val();
  var var_alturaposte = $("#alturaPoste").val();

 /* implementar ajax para llamar a tu servico GetId*/

          $.ajax({
            url:"http://localhost/calculosElectricos/public/posteid",
            method:"POST", //indico que quiero traer info de la BD
            //data:{get_id_poste:get_id_poste, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            data:{idPoste:var_idposte, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            dataType: "text",
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

            filas = ""; //declarando una variable en Jscript
                        //dibujando el formulario en JS

                filas += '<div class="form-group">';

                filas += '<label for="texto">Id Poste</label>';
    
                filas += '<input readonly id="idPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Tipo</label>';
    
                filas += '<input id="tipoPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Altura</label>';
    
                filas += '<input id="alturaPoste" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';
                                             
              $("#form_editarPoste").html(filas); //llamo a la variable creada
            }
              });
   }


function updatePoste(){

  var var_idposte = $("#idPoste").val();
  var var_tipoposte = $("#tipoPoste").val();
  var var_alturaposte = $("#alturaPoste").val();

        $.ajax({
            url:"http://localhost/calculosElectricos/public/actualizarposte",
            method:"POST", //Envía la data
            data:{idPoste:var_idposte, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            dataType: "text",
           
            success:function(respuesta) //este es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              $("#idPoste").val(""); //dejando campos en blanco luego de guardar
              $("#tipoPoste").val("");
              $("#alturaPoste").val("");
              
              alert("actualización correcta!!");
              },

              error:function() //este es el json con toda la data que responde la confirmación
            {
              console.log("error");
              alert("error!!");

              }
          });
}

</script>