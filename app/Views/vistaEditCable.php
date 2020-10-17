<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">


</head>
<body>
    <div class="contenedor">
                
<center><h2>EDITAR CABLE</h2></center>
  
  <center>
<input type="text" id="get_id_cable" value="<?php echo $_GET["id"]; ?>" hidden> </input>
    <div id="form_editCable"></div> <!--Varible creada para el form-->
  <!--<div class="form-group">   código hidden=> permite ocultar
    <label for="texto">Id Cable</label>
    <input id="idCable" type="text" style="width : 150px; heigth : 150px" class="form-control">
  </div>

  <div class="form-group">
    <label for="texto">Tiro de rotura</label>
    <input id="tiroCable" type="text" style="width : 150px; heigth : 150px" class="form-control">
  </div>

  <div class="form-group">
    <label for="texto">Peso Cable</label>
    <input id="pesoCable" type="text" style="width : 150px; heigth : 150px" class="form-control">
  </div>-->

  <button class="btn btn-primary" onclick="updateCable()">Modificar</button>
  
  <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
</center>

</div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

editarCable(); //Creo mi método

function editarCable(){

  var get_id_cable = $("#get_id_cable").val();
  //var var_idcable = $("#idCable").val();
  var var_tirocable = $("#tiroCable").val();
  var var_pesocable = $("#pesoCable").val();


           $.ajax({
            url:"http://localhost/calculosElectricos/public/cableid",
            method:"POST", //indico que quiero traer info de la BD
            data:{idCable:get_id_cable},
            //data:{idPoste:var_idposte, tipoPoste:var_tipoposte, alturaPoste:var_alturaposte},
            dataType: "json",
       
            success:function(item) //este es el json con toda la data
            {
               filas = "";
              console.log(item);
              console.log(item.id_cable);
               
            filas = ""; //declarando una variable en Jscript
                        //dibujando el formulario en JS

                filas += '<div class="form-group">';

                filas += '<label for="texto">Id Cable</label>';
    
                filas += '<input readonly id="idCable" type="text" style="width : 150px; heigth : 150px" class="form-control" value="'+item.id_cable+'">'; //readonly, campo no editable

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Tiro de rotura</label>';
    
                filas += '<input id="tiroCable" type="text" style="width : 150px; heigth : 150px" class="form-control" value="'+item.tiro_cable+'">';

                filas +='</div>';


                filas += '<div class="form-group">';

                filas += '<label for="texto">Peso Cable</label>';
    
                filas += '<input id="pesoCable" type="text" style="width : 150px; heigth : 150px" class="form-control" value="'+item.peso_cable+'">';

                filas +='</div>';
                                             
              $("#form_editCable").html(filas); //llamo a la variable creada

              }

              });
   }
         

function updateCable(){
  var var_idcable = $("#idCable").val();
  var var_tirocable = $("#tiroCable").val();
  var var_pesocable = $("#pesoCable").val();

        $.ajax({
            url:"http://localhost/calculosElectricos/public/actualizarcable",
            method:"POST", //Envía la data
            data:{idCable:var_idcable, tiroCable:var_tirocable, pesoCable:var_pesocable},
            dataType: "text",
           
            success:function(respuesta) //este es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              //$("#idCable").val(""); //dejando campos en blanco luego de guardar
              $("#idCable").val(); //dejando datos en el campo
              $("#tiroCable").val();
              $("#pesoCable").val();
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