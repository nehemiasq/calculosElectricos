<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
        <center><h2>MENU PRINCIPAL</h2></center>
        <div class="barra__buscador">
            
                <input type="text" name="buscar" placeholder="Buscar proyecto" 
                class="input__text" >
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">

                <!--BOTONES-->
                 <a href="<?php echo base_url()?>/public/ControllerFormCalculo" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Nuevo Cálculo</a> 

                 <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Mantenimiento Poste</a>

                  <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Mantenimiento Cable</a>


                  <!--<button class="btn btn-primary" onclick="calculo()">Eliminar</button>-->

                  <input type="submit" class="btn" name="btn_buscar" value="Salir">
             
            </div>
            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID Proyecto</th>
      <th scope="col">Nombre Proyecto</th>
      <th scope="col">Tipo Poste</th>
      <th scope="col">Altura (mts)</th>
      <th scope="col">Poste enterrado (mts)</th>
      <th scope="col">Tiro Rotura (kg)</th>
      <th scope="col">Tiro Instalación (kg)</th>
      <th scope="col">Catenaria (mts)</th>
      <th scope="col">Peso (kg/m)</th>
      <th scope="col">Vano (mts)</th>
      <th scope="col">Longitud Total (mts)</th>
      <th scope="col">Estado de proyecto</th>
    </tr>
  </thead>
  <tbody id="tabla_proyecto"> <!--creando una variable para mi tabla-->
    
  </tbody>

</table>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

listarProyectos(); //Cre mi método

function listarProyectos(){
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listaproyectos",
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

              filas = ""; //declarando una variable en Jscript
                $.each(respuesta,function(key,item){

                filas += '<tr>';

                filas += '<th scope="row">'+item.id_operaciones+'</th>';
    
                filas += '<td>'+item.nom_proyecto+'</td>';
                
                filas += '<td>'+item.tipo_poste+'</td>';

                filas += '<td>'+item.altura_poste+'</td>';

                filas += '<td>'+item.poste_enterrado+'</td>';

                filas += '<td>'+item.tiro_cable+'</td>';

                filas += '<td>'+item.tiro_instalacion+'</td>';

                filas += '<td>'+item.param_catenaria+'</td>';

                filas += '<td>'+item.peso_cable+'</td>';

                filas += '<td>'+item.vano+'</td>';

                filas += '<td>'+item.longitud+'</td>';


                if (item.estado_proyecto ==0){  //indicando el estado según la BD,se muestra el enunciado
                  filas += '<td>Iniciado</td>';

                }else if(item.estado_proyecto ==1){
                  filas += '<td>En curso</td>';

                }else{
                  filas += '<td>Finalizado</td>';
                }

                //filas += '<td>'+item.estado_proyecto+'</td>';

                filas += '<td><button class="btn btn-primary" onclick="update('+item.id_operaciones+')">Proceso</button></td>';

                filas += '<td><button class="btn btn-primary" onclick="eliminarProyecto('+item.id_operaciones+')">Eliminar</button></td>';
               // filas += '<td><button class="btn btn-primary" onclick="text()">Eliminar</button></td>';
                filas+= '</tr>';
                });
              $("#tabla_proyecto").html(filas);

              }
          });

}
      
      function estadoProyecto(){

      var var_idOperaciones = $("#idOperaciones").val();
      var var_estadoProyecto = $("#estadoProyecto").val();

          $.ajax({
            url:"http://localhost/calculosElectricos/public/estadoproyecto",
            method:"POST", //Envía la data
            data:{idOperaciones:var_idcable, estadoProyecto:var_estadoProyecto},
            dataType: "text",
           
            success:function(respuesta) //ste es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              alert("eliminación correcta!!");
              location.reload(); //código me sirve para que una vez ejecutado el boton eliminar, actualice

              },

              error:function() //este es el json con toda la data que responde la confirmación
            {
              console.log("error");
              alert("error!!");

              }
          });

        }

        function eliminarProyecto(param_idProyecto){

          $.ajax({
            url:"http://localhost/calculosElectricos/public/eliminarproyecto",
            method:"POST", //Envía la data
            data:{idOperaciones:param_idProyecto},
            dataType: "text",
           
            success:function(respuesta) //ste es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              alert("eliminación correcta!!");
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
