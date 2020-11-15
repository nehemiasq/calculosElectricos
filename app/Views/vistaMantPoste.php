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

                <a href="<?php echo base_url()?>/public/ControllerGraficoPoste" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Ver gráfico</a>

                <button onclick="exportTableToExcel('tblData')">Exportar excel</button>
                <button onclick="demoFromHTML()">Exportar pdf</button>

                <!--<a href="insert.php" class="btn btn__nuevo">Nuevo</a>-->
          </div>
<div id="customers" name="customers">
<table id="tblData" class="table table-striped">
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
</div>

<canvas id="bar-chart" width="200" height="50"></canvas>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="../assets/js/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script type="text/javascript">

listarPostes(); //Creo mi método
//graficoPoste();


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

          /*      filas += '<td><button class="btn btn-primary" onclick="editarPoste('+item.id_poste+')">Editar</button></td>';
*/
                filas += '<td><a href="http://localhost/calculosElectricos/public/ControllerFormEditPoste?id='+item.id_poste+'" class="btn btn-warning" name="btn_buscar" value="Mantenimiento Poste">Editar</a></td>';

                filas += '<td><button class="btn btn-primary" onclick="eliminarPoste('+item.id_poste+')">Eliminar</button></td>';

                filas+= '</tr>';

                });
              $("#tabla_MantPoste").html(filas);


              //código de gráfico 

    /*new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Concreto BT", "Concreto MT", "Madera"],
      datasets: [
        {
          label: "Poste",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: [5,10,15,20]
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
});*/

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

  function exportTableToExcel(tableID, filename = ''){ //código para exportar en excel
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'CRUD_Poste.xls';
    
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

 function demoFromHTML() {
               var pdf = new jsPDF('l', 'pt', 'a4');
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
                   pdf.save('Reporte_Poste.pdf');
               }
               , margins);
           }

</script>