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
  </div>

  <button class="btn btn-primary" onclick="guardarPoste()">Guardar</button>

  <!--<button type="submit" class="btn btn-primary">Nuevo</button>-->

  <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
</center>

    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">


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