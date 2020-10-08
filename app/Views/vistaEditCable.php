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
  <div class="form-group">
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
  </div>

  <button class="btn btn-primary" onclick="updateCable()">Modificar</button>
  
  <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
</center>

    </div>
    
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">


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
              
              $("#idCable").val(""); //dejando campos en blanco luego de guardar
              $("#tiroCable").val("");
              $("#pesoCable").val("");
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