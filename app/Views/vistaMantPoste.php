<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
        <center><h2>MANTENIMIENTO POSTE</h2></center>
        <div class="barra__buscador">
            
                <input type="text" name="buscar" placeholder="buscar" 
                class="input__text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">

                <a href="<?php echo base_url()?>/public/ControllerFormNuevoPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Nuevo Poste</a>

                <!--<a href="<?php //echo base_url()?>/public/ControllerFormEditPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Editar</a>

                <input type="submit" class="btn" name="btn_buscar" value="Eliminar">-->
                
                <a href="<?php echo base_url()?>/public/ControllerPrincipal" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Menu Principal</a>

                <!--<a href="insert.php" class="btn btn__nuevo">Nuevo</a>-->
          </div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id Poste</th>
      <th scope="col">Tipo de Poste</th>
      <th scope="col">Altura de Poste (mts)</th>
      </tr>
  </thead>

  <tbody id='tabla_MantPoste'> <!--creando una variable para mi tabla-->

  </tbody>
</table>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

listarPostes(); //Creo mi método

function listarPostes(){
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listapostes",
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

              filas = ""; //declarando una variable en Jscript
                $.each(respuesta,function(key,item){

                filas += '<tr>';

                filas += '<th scope="row">'+item.id_poste+'</th>';
    
                filas += '<td>'+item.tipo_poste+'</td>';
                
                filas += '<td>'+item.altura_poste+'</td>';

                filas += '<td><button class="btn btn-primary" onclick="editarPoste('+item.id_poste+')">Editar</button></td>';

                filas += '<td><button class="btn btn-primary" onclick="eliminarPoste('+item.id_poste+')">Eliminar</button></td>';

                filas+= '</tr>';
                });
              $("#tabla_MantPoste").html(filas);

              }
          });
}

function eliminarPoste(param_idPoste){

          $.ajax({
            url:"http://localhost/calculosElectricos/public/eliminarposte",
            method:"POST", //Envía la data
            data:{idPoste:param_idPoste},
            dataType: "text",
           
            success:function(respuesta) //ste es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              alert("Poste eliminado!!");
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