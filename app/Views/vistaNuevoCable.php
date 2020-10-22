<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">


</head>
<body>
    <div class="contenedor">
                
<center><h2>NUEVO CABLE</h2></center>
  
  <center><div id="form_aumentarCable"></div>
  <!--<div class="form-group">
    <label for="texto">Id Cable</label>
    <input id="idCable" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="">
  </div>

  <div class="form-group">
    <label for="texto">Tiro de rotura</label>
    <input id="tiroCable" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="Tiro de rotura">
  </div>

  <div class="form-group">
    <label for="texto">Peso cable</label>
    <input id="pesoCable" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="Peso cable">
  </div>-->

  <button class="btn btn-primary" onclick="guardarCable()">Guardar</button>

  <!--<button type="submit" class="btn btn-primary">Nuevo</button>-->

  <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
</center>

    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">


aumentarCable(); //Creo mi método

function aumentarCable(){

           $.ajax({
            url:"http://localhost/calculosElectricos/public/incrementarid",
            method:"POST", //indico que quiero traer info de la BD
            //data:{idCable:get_id_cable},
            //data:{idPoste:var_idposte, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            dataType: "text",
       
            success:function(item) //este es el json con toda la data
            {
                //var pointNum = parseFloat(text); //string y convertirlo a un número con decimales
              //var numericaInt = parseInt(cadena); string y convertirlo a entero

             var item = parseInt(item); //convirtiento de string a número

              item = item + 1; //autoincrementable

            filas = ""; //declarando una variable en Jscript
                        //dibujando el formulario en JS

                filas += '<div class="form-group">';

                filas += '<label for="texto">Id Cable</label>';
    
                filas += '<input readonly id="idCable" type="text" style="width : 150px; heigth : 150px" class="form-control" value="'+item+'">'; //readonly, campo no editable

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Tiro de rotura</label>';
    
                filas += '<input id="tiroCable" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Peso Cable</label>';
    
                filas += '<input id="pesoCable" type="text" style="width : 150px; heigth : 150px" class="form-control">';

                filas +='</div>';
                                             
              $("#form_aumentarCable").html(filas); //llamo a la variable que he creado

              }

              });
   }



function guardarCable(){
  var var_idcable = $("#idCable").val();
  var var_tirocable = $("#tiroCable").val();
  var var_pesocable = $("#pesoCable").val();

        $.ajax({
            url:"http://localhost/calculosElectricos/public/nuevocable",
            method:"POST", //Envía la data
            data:{idCable:var_idcable, tiroCable:var_tirocable, pesoCable:var_pesocable},
            dataType: "text",
           
            success:function(respuesta) //este es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              $("#idCable").val(""); //dejando campos en blanco luego de guardar
              $("#tiroCable").val("");
              $("#pesoCable").val("");
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