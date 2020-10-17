<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación</title>

<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>
<body>
    <div class="contenedor">
    	<center><h2>CÁLCULOS MECÁNICOS DE REDES ELÉCTRICAS</h2></center>
   <center>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="texto">Código de proyecto</label>
      <input id="idOperaciones" style="width : 150px; heigth : 150px" class="form-control" id="texto" placeholder="">
    </div>
    <div class="form-group col-md-6">
      <label for="texto">Nombre de proyecto</label>
      <input id="nomProyecto" style="width : 150px; heigth : 150px" class="form-control" id="texto" placeholder="">
    </div>
  </div>

<div class="form-group">
      <label for="inputState">Poste:</label>
      <select id='cboTipoPoste' style="width : 180px; heigth : 180px" class="form-control">
      <option selected>Seleccione poste</option>
       
      </select>

     <div class="form-group">
      <label for="inputState">Altura Poste (mts):</label>
      <select id="cboAlturaPoste" style="width : 180px; heigth : 180px" class="form-control">
        <!--onchange="prueba()"-Me va servir para mostrar un dato de un combo a un campo----->
        <option selected>Seleccione altura</option>
       
      </select>

  <div class="form-group">
    <label for="text">Profundidad enterrada (mts):</label>
    <input id="posteEnterrado" style="width : 180px; heigth : 180px" class="form-control" id="texto" placeholder="">
  </div>
  <label for="texto">Tiro horizontal cable conductor:</label>

  <div class="form-group">
      <label for="inputState">Tiro Rotura (kg):</label>
      <select id="cboTiroCable" style="width : 180px; heigth : 180px" class="form-control">
        <option selected>Seleccione tiro</option>
      
      </select>
<div class="form-group">
    <label for="text">Tiro instalación (kg):</label>
    <input id="instalacion" style="width : 180px; heigth : 180px" class="form-control" id="texto" placeholder="">
  </div>

<div class="form-group">
    <label for="text">Parámetro Catenaria (mts):</label>
    <input id="catenaria" style="width : 180px; heigth : 180px" class="form-control" id="texto" placeholder="">
  </div>

<div class="form-group">
      <label for="inputState">Peso unitario cable (kg/m):</label>
      <select id="cboPesoCable" style="width : 180px; heigth : 180px" class="form-control">
        <option selected>Seleccione peso</option>
       
      </select>

<div class="form-group">
    <label for="text">Vano horizontal (mts):</label>
    <input id="vano" style="width : 180px; heigth : 180px" class="form-control" id="texto" placeholder="">
  </div>

<div class="form-group">
    <label for="text">Longitud total catenaria (mts):</label>
    <input id="longitud" style="width : 180px; heigth : 180px" class="form-control" id="texto" placeholder="">
  </div>

  <button class="btn btn-primary" onclick="calculo()">Calcular</button>

  <button class="btn btn-primary" onclick="insertarProyecto()">Guardar</button> <!--el boton llama la funcion creada-->

  <!--<button type="submit" class="btn btn-primary">Nuevo</button>  
  <button type="submit" class="btn btn-primary">Menu Principal</button>-->
  
  <a href="<?php echo base_url()?>/public/ControllerPrincipal" class="btn btn-primary" name="btn_buscar" value="Mantenimiento Poste">Menu Principal</a>
</center>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

listarCboTipoPoste(); //Creo mi método (funciones)
listarCboAlturaPoste();
listarCboTiroCable();
listarCboPesoCable();

function listarCboTipoPoste(){
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listapostes", //ruta del API postes
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);

              lista = "";
              lista += '<select><option value = "" selected>Seleccione poste</option></select>'; //declarando una variable en Jscript
                $.each(respuesta,function(key,item){

               //lista += '<select>'; //estructura del combito
                lista += '<option value="'+item.tipo_poste+'">'+item.tipo_poste+'</option>'; //solo llamo al tipo poste
                
                });
                lista+= '</select>';
              $("#cboTipoPoste").html(lista);  //cboTipoPoste es el id que le puse al combo

              }
          });
}

function listarCboAlturaPoste(){
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listapostes", //ruta del API postes
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);
              
              lista = ""; //declarando una variable en Jscript
              lista += '<select><option value = "" selected>Seleccione altura</option></select>';
                $.each(respuesta,function(key,item){

                //lista += '<select>'; //estructura del combito
                lista += '<option value="'+item.altura_poste+'">'+item.altura_poste+'</option>'; //solo llamo altura poste
                
                });
                lista+= '</select>';

              $("#cboAlturaPoste").html(lista);  //cboAlturaPoste es el id que le puse al combo

              }
          });
}

function listarCboTiroCable(){
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listacables", //ruta del API cables
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);
              
              lista = ""; //declarando una variable en Jscript
              lista += '<select><option value = "" selected>Seleccione tiro</option></select>';
                $.each(respuesta,function(key,item){

                //lista += '<select>'; //estructura del combito
                lista += '<option value="'+item.tiro_cable+'">'+item.tiro_cable+'</option>'; //solo llamo al tiro cable
                
                });
                lista+= '</select>';
              $("#cboTiroCable").html(lista);  //cboTiroCable es el id que le puse al combo del html

              }
          });
}

function listarCboPesoCable(){
        $.ajax({
            url:"http://localhost/calculosElectricos/public/listacables", //ruta del API cables
            method:"GET", //indico que quiero traer info de la BD
       
            success:function(respuesta) //este es el json con toda la data
            {
              console.log(respuesta);
              
              lista = ""; //declarando una variable en Jscript
              lista += '<select><option value = "" selected>Seleccione peso</option></select>';
                $.each(respuesta,function(key,item){

                //lista += '<select>'; //estructura del combito
                lista += '<option value="'+item.peso_cable+'">'+item.peso_cable+'</option>'; //solo llamo al peso cable
                
                });
                lista+= '</select>';
              $("#cboPesoCable").html(lista);  //cboPesoCable es el id que le puse al combo del html

              }
          });
}

function insertarProyecto(){
  var var_idProyecto = $("#idOperaciones").val();
  var var_nomProyecto = $("#nomProyecto").val();
  var var_tipoPoste = $("#cboTipoPoste").val();  //conectando el combo con javaScript
  var var_alturaPoste = $("#cboAlturaPoste").val();
  var var_enterradoPoste = $("#posteEnterrado").val();
  var var_tiroCable = $("#cboTiroCable").val();
  var var_tiroInstaCable = $("#instalacion").val();
  var var_parametro = $("#catenaria").val();
  var var_pesoCable = $("#cboPesoCable").val();
  var var_vano = $("#vano").val();
  var var_longitud = $("#longitud").val();

  console.log("cboPoste: "+var_tipoPoste); //me muestra por parte si la info esta viajando
  console.log("cboAltura: "+var_alturaPoste);

        $.ajax({
            url:"http://localhost/calculosElectricos/public/nuevoproyecto", //ruta del API proyectos
            method:"POST", //Envía la data
            data:{idOperaciones:var_idProyecto, nomProyecto:var_nomProyecto, tipoPoste:var_tipoPoste, alturaPoste:var_alturaPoste, posteEnterrado:var_enterradoPoste, tiroCable:var_tiroCable, instalacion:var_tiroInstaCable, catenaria:var_parametro, pesoCable:var_pesoCable, vano:var_vano, longitud:var_longitud},
            dataType: "text",
           
            success:function(respuesta) //este es el json con toda la data que responde la confirmación
            {
              console.log(respuesta);
              
              $("#idOperaciones").val(""); //dejando campos en blanco luego de guardar
              $("#nomProyecto").val("");
              $("#cboTipoPoste").val("");
              $("#cboAlturaPoste").val("");
              $("#posteEnterrado").val("");
              $("#cboTiroCable").val("");
              $("#instalacion").val("");
              $("#catenaria").val("");
              $("#cboPesoCable").val("");
              $("#vano").val("");
              $("#longitud").val("");

              alert("inserción correcta!!");
              },

              error:function() //este es el json con toda la data que responde la confirmación
            {
              console.log("error");
              alert("error!!");

              }
          });
}

/*function prueba(){
      
  $("#longitud").val("10");
  alert("hola..");
}*/

function calculo(){

var var_tipoPoste = $("#cboTipoPoste").val();
var var_alturaPoste = $("#cboAlturaPoste").val();
var var_enterradoPoste = $("#posteEnterrado").val();

var var_tiroCable = $("#cboTiroCable").val();
var var_tiroInstaCable = $("#instalacion").val();
var var_parametro = $("#catenaria").val();
var var_pesoCable = $("#cboPesoCable").val();
var var_vano = $("#vano").val();
var var_longitud = $("#longitud").val();

//Calculo poste enterrado
if (var_tipoPoste == 'Concreto BT'){

var_enterradoPoste = var_alturaPoste/10;

$("#posteEnterrado").val(var_enterradoPoste); //indico a que campo de texto quiero mandar y que valor envia

}else{

var_enterradoPoste = ((var_alturaPoste/10)+0.6);

$("#posteEnterrado").val(var_enterradoPoste.toFixed(1)); //.toFixed(1)=> solo quiero un decimal

}

//calculo tiro y parametro

var_tiroInstaCable = var_tiroCable * 0.18;

$("#instalacion").val(var_tiroInstaCable.toFixed(3));

var_parametro = var_tiroInstaCable/var_pesoCable;

$("#catenaria").val(var_parametro.toFixed(2));

//calculo longitud total de instalación

var_longitud = 0.5*((Math.pow(2.718281828459, (var_vano/(2*var_parametro)))-(Math.pow(2.718281828459, (-var_vano/(2*var_parametro))))));

$("#longitud").val((2*var_parametro*var_longitud).toFixed(3));

}

</script>