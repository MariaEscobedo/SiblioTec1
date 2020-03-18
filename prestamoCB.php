<?php
session_start(); //Inicia sesion
include 'Db.php';//enlaza al archivo Db.php

$apellido=$_SESSION['Apellido']; //Carga los datos del usuario obtenidos de la base de datos
$nombre=$_SESSION['Nombre']; //Carga los datos del usuario obtenidos de la base de datos
$imagen=$_SESSION['Imagen'];
$cargo=$_SESSION['Cargo'];//Carga los datos del usuario obtenidos de la base de datos

 $codlibro=  $_SESSION['CodLibro'] =  $_GET['valor'];
 $accion = $_GET['valor1'];	
  $consulta="SELECT * FROM libros2017 where CodLibro = $codlibro"; //selecciona el  de la base de datos y crea una consulta
  $link=Conexion('basededatos'); //conecta con la base de datos
  $R=Ejecutar_Consulta($link,$consulta); // ejecuta una consulta y crea una variable para alojar el resultado
  $matriz=mysqli_fetch_array($R); // le otorga La variable resultado a una Matriz
  $codlibros=$matriz['CodLibro']; //Carga los datos de las herramientas obtenidos
  $cantidadenstock=$matriz['Cantidad'];//Carga los datos de las herramientas obtenidos de la base de datos
  $descripcion=$matriz['Titulo'];//Carga los datos de las herramientas obtenidos de la base de datos
   $codlibro=$matriz['CodLibro'];//Carga los datos de las herramientas obtenidos de la base de datos
  // $consultastock="SELECT * FROM prestamo WHERE CodLibro=$codlibro";
  // $link=Conexion('basededatos'); //conecta con la base de datos
  // $stok=Ejecutar_Consulta($link,$consultastock); // ejecuta una consulta y crea una variable para alojar el resultado
  // $stock=mysqli_fetch_array($stok);
  // $cantidadenstock=$stock['CantStock'];

$horaactual = date("H");
$hoy = date("Y-m-d");
 if ($horaactual <14){
   $FechaHoraDev = date("Y-m-d 12:00:00");
$Turno="Mañana";}
else{
  $Turno="Tarde";
   $FechaHoraDev = date("Y-m-d 17:00:00");
   }


?>
<link rel="stylesheet" type="text/css" href="css1/estilopres.css">
<link rel="stylesheet" type="text/css" href="calendario/calendar-blue.css">
<link rel="stylesheet" href="jquery/estilo/themes/smoothness/jquery-ui.css">
<script src="jquery/jquery-1.10.2.js"></script>
<script src="jquery/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
			$("#id_producto1").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto1').val(ui.item.id_producto1);
					$('#cantidad1').val(ui.item.cantidad1);
					$('#titulo1').val(ui.item.titulo1);
					
			     }
            });
            $("#id_producto2").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto2').val(ui.item.id_producto2);
					$('#cantidad2').val(ui.item.cantidad2);
					$('#titulo2').val(ui.item.titulo2);
					
			     }
            });
			 $("#id_producto3").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto3').val(ui.item.id_producto3);
					$('#cantidad3').val(ui.item.cantidad3);
					$('#titulo3').val(ui.item.titulo3);
					
			     }
            });
			$("#id_producto4").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto4').val(ui.item.id_producto4);
					$('#cantidad4').val(ui.item.cantidad4);
					$('#titulo4').val(ui.item.titulo4);
					
			     }
            });
			$("#id_producto5").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto5').val(ui.item.id_producto5);
					$('#cantidad5').val(ui.item.cantidad5);
					$('#titulo5').val(ui.item.titulo5);
					
			     }
            });
			$("#id_producto6").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto6').val(ui.item.id_producto6);
					$('#cantidad6').val(ui.item.cantidad6);
					$('#titulo6').val(ui.item.titulo6);
					
			     }
            });
			 $("#id_producto7").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto7').val(ui.item.id_producto7);
					$('#cantidad7').val(ui.item.cantidad7);
					$('#titulo7').val(ui.item.titulo7);
					
			     }
            });
			$("#id_producto8").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto8').val(ui.item.id_producto8);
					$('#cantidad8').val(ui.item.cantidad8);
					$('#titulo8').val(ui.item.titulo8);
					
			     }
            });
			$("#id_producto9").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto9').val(ui.item.id_producto9);
					$('#cantidad9').val(ui.item.cantidad9);
					$('#titulo9').val(ui.item.titulo9);
					
			     }
            });
			$("#id_producto10").autocomplete({
                source: "productos.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
					$('#id_producto10').val(ui.item.id_producto10);
					$('#cantidad10').val(ui.item.cantidad10);
					$('#titulo10').val(ui.item.titulo10);
					
			     }
            });
		});


</script>
<body>
  <title>SiblioTec Prestamo</title>
<meta charset="utf-8">
</body>
<?php
encabezado ($nombre, $apellido, $cargo, $imagen); //se le asigna los datos que va contener el encabezado

menu($cargo); 

?>

<script type="text/JavaScript" src="calendario/calendar.js"></script>
<script type="text/JavaScript" src="calendario/calendar-setup.js"></script>
<script type="text/JavaScript" src="calendario/lang/calendar-sp.js"></script>
	
<form class="form" action='metaprestamo.php' method='POST' class="">


<?php
if($accion == "presta"){
?>
<br>
 <h1>PRESTAMO DE LIBROS POR CODIGO DE BARRAS</h1>
<?php
}else if($accion == "devuelve"){
?>
 <h1>DEVOLUCION DE LIBROS POR CODIGO DE BARRAS</h1>

<?php
}
?>
</br>
</br>
<div id="tabs">
  <ul>
    <li><a href="#fragment-1"><span>1</span></a></li>
    <li><a href="#fragment-2"><span>2</span></a></li>
    <li><a href="#fragment-3"><span>3</span></a></li>
    <li><a href="#fragment-4"><span>4</span></a></li>
    <li><a href="#fragment-5"><span>5</span></a></li>
    <li><a href="#fragment-6"><span>6</span></a></li>
    <li><a href="#fragment-7"><span>7</span></a></li>
    <li><a href="#fragment-8"><span>8</span></a></li>
    <li><a href="#fragment-9"><span>9</span></a></li>
    <li><a href="#fragment-10"><span>10</span></a></li>
  </ul>
  
<div id="fragment-1">


<h2>PRIMER LIBRO</h2> 
</br></br>
<div class="ui-widget">
    <h3>Codigo Libro: <br><input id="id_producto1"  type='text' value='<?php echo $codlibro?>' name='CodLibro'/>
	</br>
Titulo: <br><input id="Titulo" type='text' value='<?php echo $descripcion?>' name='titulo' />
	</br>
	Cant Existente: <br><input id="cantidad1" type='text' value='<?php echo $cantidadenstock?>' name='CantExistente'/>
</div></h3>

<h3>Cant a Prestar: <br><input  type='text' value='' name='CantaPrestar' /></h3>

 


	

<h3>Fecha y Hora de Devolucion: <br><input type="text" NAME="FechaDev" >

			

	
</br>		
</h3>
	
		

			             
<h3>
Estado de Servicio:<br> <select name="estado" class=""><?php cargar_combo_remix($sql="select descripcion from estadoservicio");?></select>
   
<br>Alumno: <br><select name="alumno"><?php cargar_combo_remix($sql="SELECT apellido FROM  alumnos ");?></select>  
<br>Docente: <br><select name="docente"><?php cargar_combo_remix($sql="SELECT nombre FROM  docentes ");?></select>  


 <script>
$( "#tabs" ).tabs();
</script>  
<center>
 <input class="bot-ped" type="submit" value="Aprobar"> 
 
</h3>
</center>
 </form>