<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
        <center><h2>GRÁFICO ESTADÍSTICO CABLE</h2></center>
        <div class="barra__buscador">
            
                <!--<input type="text" name="buscar" placeholder="Buscar proyecto" 
                class="input__text" >
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">

                BOTONES-->
                <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Regresar</a>

                 <!--<a href="<?php echo base_url()?>/public/ControllerFormCalculo" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Nuevo Cálculo</a> 

                 <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Mantenimiento Poste</a>

                  <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Mantenimiento Cable</a>


                  <button class="btn btn-primary" onclick="calculo()">Eliminar</button>

                  <input type="submit" class="btn" name="btn_buscar" value="Salir">

                  <button onclick="exportTableToExcel('tblData')">Exportar excel</button>
                  
                  <button onclick="demoFromHTML()">Exportar pdf</button>-->
             
            </div>
            <div id="customers" name="customers">
            <table id="tblData" class="table table-striped">
  <!--<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Poste</th>
      <th scope="col">Altura(mts)</th>
      <th scope="col">Enterrado(mts)</th>
      <th scope="col">TiroRotura(kg)</th>
      <th scope="col">Instalacion(kg)</th>
      <th scope="col">Catenaria(mts)</th>
      <th scope="col">Peso(kg)</th>
      <th scope="col">Vano(mts)</th>
      <th scope="col">Longitud(mts)</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>-->
  <tbody id="tabla_proyecto"> <!--creando una variable para mi tabla-->
    
  </tbody>

</table>
</div>


<canvas id="pie-chart" width="200" height="50"></canvas>


</html>