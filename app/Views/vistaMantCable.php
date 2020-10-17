<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
        <center><h2>MANTENIMIENTO CABLE</h2></center>
        <div class="barra__buscador">
            
                <input type="text" name="buscar" placeholder="buscar" 
                class="input__text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">

                <a href="<?php echo base_url()?>/public/ControllerFormNuevoCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Nuevo</a>

                <!--<a href="<?php //echo base_url()?>/public/ControllerFormEditCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Editar</a>

                <input type="submit" class="btn" name="btn_buscar" value="Eliminar">-->

                <a href="<?php echo base_url()?>/public/ControllerPrincipal" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Menu Principal</a>

                <!--<a href="insert.php" class="btn btn__nuevo">Nuevo</a>-->
  </div>
  
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id Cable</th>
      <th scope="col">Tiro de rotura (kg)</th>
      <th scope="col">Peso (kg/m)</th>
      </tr>
  </thead>

  <tbody id='tabla_MantCable'> <!--creando una variable para mi tabla-->
   
  </tbody>
</table>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

listarCables(); //Creo mi método

function listarCables(){
        
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listacables",
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

              filas = ""; //declarando una variable en Jscript
                $.each(respuesta,function(key,item){

                filas += '<tr>';

                filas += '<th scope="row">'+item.id_cable+'</th>';
    
                filas += '<td>'+item.tiro_cable+'</td>';
                
                filas += '<td>'+item.peso_cable+'</td>';

                filas += '<td><a href="http://localhost/calculosElectricos/public/ControllerFormEditCable?id='+item.id_cable+'" class="btn btn-warning" name="btn_buscar" value="Mantenimiento Poste">Editar</a></td>';

                filas += '<td><button class="btn btn-primary" onclick="eliminarCable('+item.id_cable+')">Eliminar</button></td>';

                filas+= '</tr>';
                });
              $("#tabla_MantCable").html(filas); //llamo al id creado de la tabla Cable

              }
          });
}

function eliminarCable(param_idCable){

          $.ajax({
            url:"http://localhost/calculosElectricos/public/eliminarcable",
            method:"POST", //Envía la data
            data:{idCable:param_idCable},
            dataType: "text",
           
            success:function(respuesta) //ste es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              alert("Cable eliminado correctamente!!");
              location.reload(); //código me sirve para que una vez ejecutado el boton eliminar, actualice

              },

              error:function() //este es el json con toda la data que responde la confirmación
            {
              console.log("error");
              alert("error!!");

              }
          });

        }

</script>