<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
        <center><h2>GRÁFICO ESTADÍSTICO PROYECTOS</h2></center>
        <div class="barra__buscador">
            
                BOTONES-->
                <a href="<?php echo base_url()?>/public/ControllerPrincipal" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>
                      
            </div>
            <div id="customers" name="customers">
            <table id="tblData" class="table table-striped">

</table>
</div>


<canvas id="pie-chart" width="200" height="50"></canvas>


</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="../assets/js/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<script type="text/javascript">


//listarProyectos(); //Creo mi método
mostrarGrafico();

function mostrarGrafico(){
  var arrayEstado = [];
  var contInci = 0;
  var contEncur = 0;
  var contfinal = 0;
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listaproyectos",
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

              filas = ""; //declarando una variable en Jscript
                $.each(respuesta,function(key,item){

                if (item.estado_proyecto ==0){  //indicando el estado según la BD,se muestra el enunciado
                  filas += '<td>Iniciado</td>';
                   contInci = contInci +1;

                }else if(item.estado_proyecto ==1){
                  filas += '<td>En curso</td>';
                     contEncur = contEncur +1 ;

                }else{
                  filas += '<td>Finalizado</td>';
                     contfinal = contfinal+1;
                }


             
                });

                arrayEstado.push(contInci);
                arrayEstado.push(contEncur);
                arrayEstado.push(contfinal);


              new Chart(document.getElementById("pie-chart"), {
              type: 'pie',
              data: {
                labels: ["Iniciado", "En curso", "Finalizado"],
                datasets: [{
                  label: "Population (millions)",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                  data: arrayEstado
                }]
              },
              options: {
                title: {
                  display: true,
                  text: 'Seguimiento de proyectos ABS INGENIEROS'
                }
              }
          });

              }
          });

}


      
</script>
