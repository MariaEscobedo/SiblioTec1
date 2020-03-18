<?php
header('Content-Type: application/vnd.ms-excel');

    header("Expires: 0");

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

    header("content-disposition: attachment;filename=exportar.xls");
    
   require 'Db.php'; 
$Link=Conexion('basededatos');

$sql = "SELECT * FROM libros2017";


$resultado= mysqli_query($Link,$sql);
?>
<html>
<body>
<style type="text/css">
.amarillo{
background-color:yellow;
}
.rosa{
background-color:pink;
}
.verde{
background-color:green;
}
.azul{
background-color:blue;
}
</style>

<?php
// Agregar encabezado que coincida con el archivo MAESTRO DE ARTICULOS.xls en la exportacion
// Agergar filtros en la exportacion
// Agregar estilos en la exportacion
// Agregar campos restantes en la exportacion (todos los de la tabla de herramientas de la BD)
echo "<div class='cajatabla'>
      <table border=10px solid black>
        <thead>
        <tr>
		
		  
          <td class='amarillo'>CodLibro</td>
          <td class='amarillo'>Cantidad</td>
         <td class='amarillo'>Inventario</td>
            <td class='amarillo'>Autor</td>
			<td class='amarillo'>Titulo</td>
          <td class='amarillo'>Editorial</td>
		  <td class='amarillo'>Edicion</td>
		  <td class='amarillo'>Materia</td>
          
		
          
          
          
        </tr>
        </thead>
        <tbody>";
while ($fila=mysqli_fetch_assoc($resultado)){ 
  
$codlibro=$fila['CodLibro'];  
  $cantidad=$fila['Cantidad'];
  $inventario=$fila['Inventario'];
  $autor=$fila['Autor'];
  $titulo=$fila['Titulo'];
  
  $editorial=$fila['Editorial'];
  $edicion=$fila['Edicion'];
 
  $materia=$fila['Materia'];
  




  echo "<tr>
			<td>$codlibro</th>
           <td>$cantidad</th>
		   <td>$inventario</th>
           <td>$autor</th>
          <td>$titulo</th>
          
           <td>$editorial</th>
          <td>$edicion</th>
         
		  <td>$materia</th>
           
           </tr>";
           

 
     
   
 
}
echo "</table>";
?>
</body>
</html>

    

