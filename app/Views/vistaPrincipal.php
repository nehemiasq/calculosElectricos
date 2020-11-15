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
            
                <!--<input type="text" name="buscar" placeholder="Buscar proyecto" 
                class="input__text" >
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">-->

                <!--BOTONES-->
                 <a href="<?php echo base_url()?>/public/ControllerFormCalculo" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Nuevo Cálculo</a> 

                 <a href="<?php echo base_url()?>/public/ControllerPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Mantenimiento Poste</a>

                  <a href="<?php echo base_url()?>/public/ControllerCable" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Mantenimiento Cable</a>

                  <a href="<?php echo base_url()?>/public/ControllerGraficoPrincipal" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Ver gráfico</a>

                  <!--<button class="btn btn-primary" onclick="calculo()">Eliminar</button>

                  <input type="submit" class="btn" name="btn_buscar" value="Salir">-->

                  <button onclick="exportTableToExcel('tblData')">Exportar excel</button>
                  
                  <button onclick="demoFromHTML()">Exportar pdf</button>

                  <a href="<?php echo base_url()?>/public/ControllerLogin" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Salir</a>
             
            </div>
            <div id="customers" name="customers">
            <table id="tblData" class="table table-striped">
  <thead>
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
  </thead>
  <tbody id="tabla_proyecto"> <!--creando una variable para mi tabla-->
    
  </tbody>

</table>
</div>


<canvas id="pie-chart" width="200" height="50"></canvas>


</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="../assets/js/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<script type="text/javascript">


listarProyectos(); //Cre mi método
//grafico();

function listarProyectos(){
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
                   contInci = contInci +1;

                }else if(item.estado_proyecto ==1){
                  filas += '<td>En curso</td>';
                     contEncur = contEncur +1 ;

                }else{
                  filas += '<td>Finalizado</td>';
                     contfinal = contfinal+1;
                }


                //filas += '<td>'+item.estado_proyecto+'</td>';
                if (item.estado_proyecto <2){
                 filas += '<td><button class="btn btn-info" onclick="estadoProyecto('+item.id_operaciones+', '+item.estado_proyecto+')">Proceso</button></td>'; 

                }else{
                  filas += '<td><button class="btn btn-primary" disabled onclick="estadoProyecto('+item.id_operaciones+', '+item.estado_proyecto+')">Proceso</button></td>';
                }


                //filas += '<td><button class="btn btn-primary" onclick="estadoProyecto('+item.id_operaciones+', '+item.estado_proyecto+')">Proceso</button></td>';

                filas += '<td><button class="btn btn-primary" onclick="eliminarProyecto('+item.id_operaciones+')">Eliminar</button></td>';
               // filas += '<td><button class="btn btn-primary" onclick="text()">Eliminar</button></td>';
                filas+= '</tr>';
                });
              $("#tabla_proyecto").html(filas);

                /*arrayEstado.push(contInci);
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
          });*/

              }
          });

}
      
    function exportTableToExcel(tableID, filename = ''){ //código para exportar en excel
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Proyectos.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

      function estadoProyecto(param_id, param_estado){

      var var_idOperaciones = param_id;
      var var_estadoProyecto = param_estado;

      console.log("id: "+var_idOperaciones); //para imprimir los errores
      console.log("estado: "+var_estadoProyecto); //para imprimir los errores

      if (var_estadoProyecto == 0){

                var_estadoProyecto = var_estadoProyecto + 1;
                
              }else if(var_estadoProyecto == 1){

                var_estadoProyecto = var_estadoProyecto + 1;

              }else{

                var_estadoProyecto = var_estadoProyecto + 1;
              }

              

          $.ajax({
            url:"http://localhost/calculosElectricos/public/estadoproyecto",
            method:"POST", //Envía la data
            data:{idOperaciones:var_idOperaciones, estadoProyecto:var_estadoProyecto},
            
            dataType: "text",
           
            success:function(respuesta) //ste es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);

                            
              alert("Proceso guardado!!");
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

        function demoFromHTML() {
               var pdf = new jsPDF('l', 'pt', 'a2');
               // source can be HTML-formatted string, or a reference
               // to an actual DOM element from which the text will be scraped.
               source = $('#customers')[0];

               // we support special element handlers. Register them with jQuery-style 
               // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
               // There is no support for any other type of selectors 
               // (class, of compound) at this time.
               specialElementHandlers = {
                   // element with id of "bypass" - jQuery style selector
                   '#bypassme': function(element, renderer) {
                       // true = "handled elsewhere, bypass text extraction"
                       return true
                   }
               };
               margins = {
                   top: 80,
                   bottom: 60,
                   left: 100,
                   width: 522
               };
               // all coords and widths are in jsPDF instance's declared units
               // 'inches' in this case
               pdf.fromHTML(
                       source, // HTML string or DOM elem ref.
                       margins.left, // x coord
                       margins.top, {// y coord
                           'width': margins.width, // max width of content on PDF
                           'elementHandlers': specialElementHandlers
                       },
               function(dispose) {
                   // dispose: object with X, Y of the last line add to the PDF 
                   //          this allow the insertion of new lines after html
                   pdf.save('Reporte.pdf');
               }
               , margins);
           }

</script>
