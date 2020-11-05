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

                <button onclick="exportTableToExcel('tblData')">Exportar excel</button>
                <button onclick="demoFromHTML()">Exportar pdf</button>

                <!--<a href="insert.php" class="btn btn__nuevo">Nuevo</a>-->
  </div>
  <div id="customers" name="customers">
  <table id="tblData" class="table table-striped">
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
</div>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/jspdf.debug.js"></script>
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

  function exportTableToExcel(tableID, filename = ''){ //código para exportar en excel
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'CRUD_Cable.xls';
    
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
                   pdf.save('Reporte_Cable.pdf');
               }
               , margins);
           }

</script>