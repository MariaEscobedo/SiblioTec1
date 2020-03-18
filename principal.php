<?php
session_start(); //Inicia sesion
include 'Db.php';//enlaza al archivo Db.php

$apellido=$_SESSION['Apellido']; //Carga los datos del usuario 
$nombre=$_SESSION['Nombre']; // Carga los datos del usuario 
$imagen=$_SESSION['Imagen'];
$cargo=$_SESSION['Cargo']; // Carga los datos del usuario 
$DNI=$_SESSION['DNI']; // Carga los datos del usuario 

?>

<body>
<title>SiblioTec</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css1/princestilos.css">
<link rel="stylesheet" type="text/css" href="alerta.css">
<div class="contenedor">
<?php
encabezado($nombre, $apellido, $cargo, $imagen); //se le asigna los datos que va contener el encabezado

?>
<div class="alerta">
<!-- caja que va a mostrar los libros que no se han devuelto-->
<br>
Libros Pasados de Fecha Limite:
<br><br>
Codlibro | Titulo | CantPrestada <br>
<?php
$link=Conexion('basededatos');
$Fecha=date("Y/n/j");
$sql="SELECT * FROM prestamos WHERE FechaDev < '$Fecha' ";
$resultado= $link->query($sql);

while($libr_dev= $resultado->fetch_assoc()){
	
	echo $libr_dev['CodLibro']." | ".$libr_dev['titulo']." | ".$libr_dev['CantaPrestar']."<br>";
}

?>

</div>
<br>
<?php
menu($cargo); //crea un menu segun el cargo
//carga la tabla libros
mostrar_tabla_libros_con_paginacion();

buscar();//boton para buscar cualquier libro que este cargado en el sistema
?>
</div>
</body>
