<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">


</head>
<body style="background-image: url('../img/fondo.jpg');"> 
 


<center><h2 style="color:white">Bienvenido al Sistema de Gestión de Proyectos ABS INGENIEROS</h2></center>
  

  <br>
  <br>
  <center>
    <div class="form-group">
    <label for="texto" style="color:white">Usuario</label>
    <input id="nombreUsuario" type="text" style="width : 150px; heigth : 150px" class="form-control" placeholder="Ingrese usuario">
  </div>

  <br>
  <div class="form-group">
    <label for="texto" style="color:white">Contraseña</label>
    <input id="claveUsuario" type="password" style="width : 150px; heigth : 150px" class="form-control" placeholder="Ingrese contraseña">
  </div>

  <br>
  <!--<button class="btn btn-primary" onclick="guardarCable()">Ingresar</button>-->

  <a href="<?php echo base_url()?>/public/ControllerPrincipal" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Ingresar</a>

</center>

    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">


/*function guardarCable(){
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
}*/

</script>