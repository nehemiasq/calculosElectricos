<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
        <center><h2>GRÁFICO ESTADÍSTICO POSTE</h2></center>
        <div class="barra__buscador">
            
                            
                <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>

                            
            </div>
            <div id="customers" name="customers">
            <table id="tblData" class="table table-striped">

</table>
</div>


<canvas id="bar-chart" width="200" height="50"></canvas>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
graficaPoste();

  function graficaPoste(){

    var arrayTipo = [];
    var arrayData = [];
    var arrayColor = [];
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listapostes",
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

              filas = ""; //declarando una variable en Jscript
                $.each(respuesta,function(key,item){

           console.log("asa");
           arrayTipo.push(item.tipo_poste);
           arrayData.push(item.altura_poste);
           arrayColor.push("#3e95cd");

                });
            


              //código de gráfico 

              new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: arrayTipo,
      datasets: [
        {
          label: "Poste",
          backgroundColor: arrayColor,
          data: arrayData
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Tipos de poste'
      }
    }
});

              }
          });
}

 </script>




