<?php 
error_reporting(0);
function Conexion ($Con){ //Crea la funcion
	$link=mysqli_connect("localhost","root","",$Con) //Realiza una consulta en donde se almacena los archivos
	or die("Error de conexion"); //En caso de que exista un error se mostrara este cartel
	return $link; //Vuelve al inicio
}

function Ejecutar_Consulta($link,$Con){
	$R=mysqli_query($link,$Con);
	return $R;
}


function ValidarUseyPass ($User, $Pass,$Userie,$Passbase,$matriz){

if ($User==$Userie){
$consulta= "INSERT INTO  auditoria SET  usuario='$matriz[Nombre].$matriz[Apellido]',acciones= 'ingresa', DescripAcciones= 'inició sesion'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);

  echo "<SCRIPT language='JavaScript'>
          location.href='principal.php';
        </SCRIPT> ";
  }
    else{   $Userie=" ";    ?>
      <SCRIPT language='JavaScript'>
        alert ("El nombre de usuario y contrasena es incorrecto");
        location.href='Login.php';
      </SCRIPT>             <?php
      }
if ($Pass==$Passbase){
  echo "La contrasena es ".$Passbase;
  }
  else{   $Passbase=" ";   ?>
    <SCRIPT language='JavaScript'>
      alert ("El nombre de usuario y contrasena es incorrecto");
      location.href='Login.php';
    </SCRIPT>               <?php
    }
}

function encabezado($nombre,$apellido,$cargo,$imagen){

$HoraLocal=date("h:i:s");

$Fecha=date("j/n/y");
?>
<div class="cajaencabezado">
<img width="100px" height="100px" src="photo<?php echo $imagen;?>.jpg" class="imagencabezado">
<p class="textoencabezado">
<?php
  echo  " Bienvenida: ".$nombre." ".$apellido."<br>"; 
  echo " Su cargo: "; 
  echo $cargo;
  echo "</br>";
  echo " Inicio sesión a las: ".$HoraLocal;
  echo "</br>";
  echo " Del día: ".$Fecha;
  echo "</br>";
?>
</p>
</div>
<?php
}

function menu($cargo){
  
  if($cargo=='Super Usuario'){
?>
<div class="cajabienvenida">

    <p class="bienvenida">SiblioTec</p>
    <p class="subtitulo">Sistema de Biblioteca 1</p>
</div>
    
    <div class="cajamenu">
        <nav class="menu">
            <ul>
                <li><a href="principal.php" class="amenu">Inicio</a></li>
				<li><a href="listadeusuario.php" class="amenu">Usuarios</a></li>
                
                <li><a href="nuevousuario.php" class="amenu">Nuevo Usuario</a></li>
				<li><a href="nuevo.php" class="amenu">Nuevo Libro</a></li>
                 <li><a href="exportar.php" class="amenu">Exportar </a></li>
                
                <li><a href="Importar/importar.php" class="amenu">Importar</a></li>
                <li><a href="BorrarLibros.php" class="amenu">Borrar Libros</a></li>
                
                <li><a href="prestados.php" class="amenu">Prestados</a></li>  
	            <li><a href="auditoria.php" class="amenu">Auditoria</a></li>  
               <li><a href="listado.php" class="amenu">Listado</a></li>
                <li><a href="salir.php" class="amenu">Salir</a></li>
            </ul>
        </nav>
    </div>  
    <!-- "Graficos realizado/graficos/index.php" -->
<?php
}

   if($cargo=='Administrador'){
   ?>
<div class="cajabienvenida">
    <p class="bienvenida">Bienvenido</p>
    <p class="subtitulo"> al sistema de Blibioteca(SiblioTec)</p>
</div>
    
    <div class="cajamenu">
        <nav class="menu">
            <ul>
                <li><a href="principal.php" class="amenu">Inicio</a></li>
                <li><a href="listadeusuario.php" class="amenu">Usuarios</a></li>
                <li><a href="nuevo.php" class="amenu">Nuevo Libro</a></li>
                <li><a href="nuevousuario.php" class="amenu">Nuevo Usuario</a></li>
                <li><a href="importar.php" class="amenu">Importar Tabla</a></li>
                
                <li><a href="listado.php" class="amenu">Listado</a></li>
                <li><a href="salir.php" class="amenu">Salir</a></li>
            </ul>
        </nav>
    </div>


<?php
  }
   if($cargo=='Invitado'){
?>
<div class="cajabienvenida">
    <p class="bienvenida">Bienvenido</p>
    <p class="subtitulo"> al sistema de Blibioteca(SiblioTec)</p>
</div>
    
    <div class="cajamenu">
        <nav class="menu">
            <ul>
                           <li><a href="principal.php" class="amenu">Inicio</a></li>
                <li><a href="listadeusuario.php" class="amenu">Usuarios</a></li>
           
                
                <li><a href="listado.php" class="amenu">Listado</a></li>
                <li><a href="salir.php" class="amenu">Salir</a></li>
            </ul>
        </nav>
    </div>

<?php  
  }  
}


function enc_tabla($consulta){
  //$enlace=Conexion('basededatos');
  //$i=0;
  //$resultado=mysqli_query($enlace,$consulta);
  
?>
<!-- <link rel='stylesheet' href='css1/estilosprincipal.css'> -->
 <section> 
    <nav classS="menu">
      <table id='encabezadousuario'>
        <tr>
          <td>DNI</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Cargo</td>
          <td>Perfil</td>
          <td>Acciones</td>
        </tr> 
      </table>
    </nav>
  </section><?php
  //while ($info=mysqli_fetch_field($resultado)){
    //echo"<td>";
    //if($i<=3){
    //$vectortabla[$i]=$info->name;
    //echo"<td>".$vectortabla[$i]."</td>";
    //$i++;
  //}
    //echo"</td>";
  //}
   
 //"</table>";

}


function mostrar_tabla($sql){   
$enlace=Conexion('basededatos'); 
$resultado=mysqli_query($enlace,$sql); 

echo "<div class='cajatabla'>
      <table>
        <thead>
        <tr>
           <td>DNI</td>
           <td>Nombre</td>
           <td>Apellido</td>
           <td>Cargo</td>
           <td>Perfil</td>
           <td>Acciones</td>
        </tr>
        </thead>
        <tbody>"; 
while ($fila=mysqli_fetch_assoc($resultado)){ 
  $DNI=$fila['DNI']; 
  $nombre=$fila['Nombre'];
  $apellido=$fila['Apellido'];
  $cargo=$fila['Cargo'];
  $imagen=$fila['Imagen'];

  echo "<tr>
           <td>$DNI</td>
           <td>$nombre</td>
           <td>$apellido</td>
           <td>$cargo</td>
           <td><img align=center width=50px height=50px src= imag/$imagen.jpg ></td>
           <td><a href='verdetallesusuario.php?valor=$DNI'><img src='img/botonampliar.png' title='Ver usuario completo'></a><a href='modificarusuario.php?valor=$DNI'><img src='img/modificar.png' title='Modificar'></a><a href='eliminarusuario.php?valor=$DNI'><img src='img/eliminar.png' title='Eliminar Usuario'></a></td>
        </tr>"; 
  }
  echo "</tbody></table></div>";
}

function cargarTEXT( $string_consulta){
/* Me conecto y Ejecutamos la query*/  
$Enlace=Conexion('basededatos');
$resultado=mysqli_query($Enlace,$string_consulta);
 while($fila = mysqli_fetch_row($resultado)){
     foreach($fila as $dato){
  echo $dato;
    }
  }
}



function motrar_tabla_libros2017($cond){ 
$enlace=Conexion('basededatos'); 
$resultado=mysqli_query($enlace,$cond); 

echo "<div class='cajatabla'>
      <table>
        <thead>
        <tr>
          <td>CodLibro</td>
          <td>Cantidad</td>
		  <td>Inventario</td>
		  <td>Autor</td>
          <td>Titulo</td>
		  <td>ISBN</td>
          <td>Editorial</td>
          <td>Edicion</td>
          <td>Año</td>
		  <td>Materia</td>
		  
		  <td>Temas</td>
          <td>ACCIONES</td>
          
        </tr>
        </thead>
        <tbody>";

while ($fila=mysqli_fetch_assoc($resultado)){ 
  
  $codlibro=$fila['CodLibro'];
  $cantidad=$fila['Cantidad'];
   $inventario=$fila['Inventario'];
  $autor=$fila['Autor'];
  $titulo=$fila['Titulo'];
  $isbn=$fila['ISBN'];
  $editorial=$fila['Editorial'];
  $edicion=$fila['Edicion'];
  $año=$fila['Anio'];
  $materia=$fila['Materia'];
  $temas=$fila['Temas'];
  
  
  

 
 


  echo "<tr>
           <td>$codlibro</td>
           <td>$cantidad</td>
		   <td>$inventario</td>
		    <td>$autor</td>
           <td>$titulo</td>
           <td>$isbn</td>
            <td>$editorial</td>
             <td>$edicion</td>
            <td>$año</td>
			<td>$materia</td>
			<td>$temas</td>
           
            
            
           
           
         
           <th>
           
           <a href='verdetalles.php?valor=$inventario'><img src='img/botonampliar.png' title='Ver'></a>
           <a href='modificar.php?valor2=$codlibro'><img src='img/modificar.png' title='Modificar'></a>
           <a href='prestamo.php?valor=$inventario'><img src='img/prestamo.png' title='Prestar'></a>
           <a href='eliminar.php?valor=$inventario'><img src='img/eliminar.png' title='Eliminar tabla'></a>
           
           </th>
        
        </tr>"; 
  }
  echo  "</tbody></table></div>";
}

function nuevoLibro($autor, $titulo,$isbn, $editorial, $edicion,$año,$materia,$cantidad,$temas,$inventario, $codlibro)

{
$consulta= "INSERT INTO  auditoria SET  usuario='$matriz[Nombre].$matriz[Apellido]',acciones= 'agrega', DescripAcciones= 'agrego un nuevo libro'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);

$consulta= "INSERT INTO  libros2017 SET Autor='$autor', Titulo='$titulo', ISBN='$isbn', Editorial='$editorial', Edicion='$edicion', Anio='$año', Materia='$materia', Cantidad='$cantidad', Temas='$temas', Inventario='$inventario', CodLibro='$codlibro'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);




if($R){
  ?>
  <script language='javascript'>
  alert('su libro se ha ingresado correctamente');
  </script>
  <script language='javascript'>
  location.href='principal.php';
  </script>
  <?php
}
  else{
    ?>
    <script language='javascript'>
    alert('No se pudo agregar');
     location.href='nuevo.php';
    </script>
    <?php
  }
}



function modificar($codlibro, $titulo, $autor,$cantidad,$materia,$inventario, $editorial, $edicion, $año )


{

$consulta="UP_DATE libros2017 SET Autor='$autor', Titulo='$titulo', Editorial='$editorial', Edicion='$edicion', Anio='$año', Materia='$materia', Cantidad='$cantidad',  Inventario='$inventario', CodLibro='$codlibro'  WHERE CodLibro='$codlibro'";
$link=Conexion('basededatos');
$R= Ejecutar_Consulta ($link, $consulta);
if($R){
	$consulta= "INSERT INTO  auditoria SET  usuario='$matriz[Nombre].$matriz[Apellido]',acciones= 'modifica', DescripAcciones= 'modifico un libro'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);
  ?>
  
  <script language='javascript'>
  alert('La consulta se ejecuto correctamente');
   location.href='principal.php';
  </script>
  <script language='javascript'>
    alert('Hubo un error al intentar modificar el libro' );
  location.href='modificar.php';
  </script>
  <?php
}
  else{
    ?>
    <script language='javascript'>
    alert('No se pudo modificar el registro');
    </script>
    <?php
  }
}
function modificarusu($apellido, $cargo, $nombre, $DNI){
$consulta="UPDATE usuario SET Nombre='$nombre', Apellido='$apellido', Cargo='$cargo'  WHERE DNI='$DNI'";
$link=Conexion('basededatos');
$R= Ejecutar_Consulta ($link, $consulta);
if($R){
$consulta= "INSERT INTO  auditoria SET  usuario='$matriz[Nombre].$matriz[Apellido]',acciones= 'modifica',DescripAcciones='modifico un usuario'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);
  ?>
  <script language='javascript'>
  alert('La consulta se ejecuto correctamente');
  </script>
  <script language='javascript'>
  location.href='listadeusuario.php';
  </script>
  <?php
}
  else{
    ?>
    <script language='javascript'>
    alert('No se pudo modificar el registro');
    </script>
    <?php
  }
}
function nuevo_Usuario($DNI, $Apellido, $Nombre, $Cargo, $User, $Pass,$Imagen){
$consulta= "INSERT INTO  auditoria SET  usuario='$matriz[Nombre].$matriz[Apellido]',acciones= 'agrega', DescripAcciones= 'agrego un nuevo usuario'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);

$consulta="INSERT INTO usuario SET DNI='$DNI',Apellido='$Apellido', Nombre='$Nombre', Cargo='$Cargo', User='$User', Pass='$Pass' , Imagen='$Imagen'  ";
$link=Conexion('basededatos');
$R= Ejecutar_Consulta ($link, $consulta);
if($R){
  ?>
  <script language='javascript'>
  alert('El usuario se guardado exitosamente');
  </script>
  <script language='javascript'>
  location.href='listadeusuario.php';
  </script>
  <?php
}
  else{
    ?>
    <script language='javascript'>
    alert('No se pudo modificar el registro');
    </script>
    <?php
  }
}

function eliminarusu($DNI){
$consulta= "INSERT INTO  auditoria SET  usuario='$matriz[Nombre].$matriz[Apellido]',acciones= 'elimina', DescripAcciones= 'elimino un usuario'";


$link=Conexion('basededatos');

$R= Ejecutar_Consulta ($link, $consulta);

$consulta="DELETE FROM usuario where DNI='$DNI'";
$link=Conexion('basededatos');
$R=Ejecutar_Consulta($link, $consulta);

if($R){
  ?>
  <script language='javascript'>
  alert('La consulta a sido exitosa');
  </script>
  <script languaje='javascript'>
    location.href='listadeusuario.php';
  </script>
  <?php
}

else{
  ?>
  <script language='javascript'>
    alert('Error');
  </script>
  <?php
  }
}

function cargar_combo_remix ($consulta) {
  $enlace= Conexion ('basededatos');
  $resultado = mysqli_query($enlace,$consulta);
  while ($fila=mysqli_fetch_row($resultado)) {
foreach ($fila as $dato) {
  echo "<option>".$dato."</option>";
    }
  }
}









function mostrar_tabla_prestamos(){
	
	
	
 $Enlace=Conexion('basededatos');

// maximo por pagina
$limit = 7;

// pagina pedida


if (isset($_GET["pag"])) {
$pag = (int) $_GET["pag"];
} else {
$pag= "";
}
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;


$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM prestamos LIMIT $offset, $limit";
$sqlTotal = "SELECT FOUND_ROWS() as total";

$resultado= mysqli_query($Enlace,$sql);
$rsTotal = mysqli_query($Enlace,$sqlTotal);

$rowTotal = mysqli_fetch_assoc($rsTotal);
// Total de registros sin limit
$total = $rowTotal["total"];

?>

<?php
echo "<div class='cajatabla'>
      <table>
        <thead>
        <tr>
		<td>Codigo</th>
		<td>Titulo</th>
		<td>Cantidad <br> Existente</th>
		<td>Cantidad a <br> Prestar</th>
          <td>Fecha y Hora del <br> Prestamo</th>
          <td>Fecha de <br> Devolucion</th>
         <td>Estado del <br> Libro</th>
         <td>Alumno</th>
          
		  <td>Docente</th>
		  
		
		  
		  
	         <td>ACCIONES PERMITIDAS</th>
          
        </tr>
        </thead>
        <tbody>
		
		";

while ($fila=mysqli_fetch_assoc($resultado)){ 
  // <link rel='stylesheet' href='css/estilos1.css'/> 
// echo "<table border='1' id='mostrartablalibros2017'>"; 

  $id=$fila['id_prestamo'];  
$codlibro=$fila['CodLibro']; 

  $Titulo=$fila['titulo'];
  $CantExistente=$fila['CantExistente'];
  $CantaPrestar=$fila['CantaPrestar'];
  $FechaPres=$fila['FechaPrestamo'];
  

  $FechaDev=$fila['FechaDev'];
   $estado=$fila['estado'];
$alumno=$fila['alumno'];
$docente=$fila['docente'];

  

    

  echo "<tr>
           <td>$codlibro</th>
           <td>$Titulo</th>
		   <td>$CantExistente</th>
           <td>$CantaPrestar</th>
          <td>$FechaPres</th>
          
      
		  <td>$FechaDev</th>
		  
		  <td>$estado</th>
		  <td>$alumno</th>
		  <td>$docente</th>
		  
       
            
           
           
           <td>
		   <a href='verdetalles.php?valor=$codlibro'>Ver Detalles</a>
                  
           <a href='eliminaprestamo.php?valor=$id & valor1=$devuelve'>Devolver Libro</a>
           
           
		   </th>
        </tr>";
        
}
echo "</tbody>";
?>
<tfoot>
      <tr>
         <td colspan="6">
      <?php
         $totalPag = ceil($total/$limit);
         $links = array();
         for( $i=1; $i<=$totalPag ; $i++)
         {
            $links[] = "<a href=\"?pag=$i\" class='linkpaginacion'>$i</a>"; 
         }
         echo implode(" - ", $links);
      ?>
         </td>
      </tr>
   </tfoot>
  </table> 
</div>
   <?php
}














function mostrar_tabla_libros_con_paginacion(){
 $Enlace=Conexion('basededatos');

// maximo por pagina
$limit = 7;

// pagina pedida


if (isset($_GET["pag"])) {
$pag = (int) $_GET["pag"];
} else {
$pag= "";
}
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;


$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM libros2017 LIMIT $offset, $limit";
$sqlTotal = "SELECT FOUND_ROWS() as total";

$resultado= mysqli_query($Enlace,$sql);
$rsTotal = mysqli_query($Enlace,$sqlTotal);

$rowTotal = mysqli_fetch_assoc($rsTotal);
// Total de registros sin limit
$total = $rowTotal["total"];

?>

<?php
echo "<div class='cajatabla'>
      <table>
        <thead>
        <tr>
		<td>CodLibro</th>
		<td>Cantidad</th>
		<td>Inventario</th>
          <td>Autor</th>
          <td>Titulo</th>
         
          <td>Editorial</th>
          <td>Edicion</th>
          
		  <td>Materia</th>
		  
		
		  
		  
	         <td>ACCIONES PERMITIDAS</th>
          
        </tr>
        </thead>
        <tbody>
		
		";

while ($fila=mysqli_fetch_assoc($resultado)){ 
  // <link rel='stylesheet' href='css/estilos1.css'/> 
// echo "<table border='1' id='mostrartablalibros2017'>"; 
  $inventario=$fila['Inventario']; 
  $presta = "presta";
  $devuelve = "devuelve";
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
		  
		  
		  
       
            
           
           
           <td>
		   <a href='verdetalles.php?valor=$codlibro'><img src='img/botonampliar.PNG' title='Mas Info'></a>
           <a href='modificar.php?valor=$codLibro'><img src='img/modificar.png' title='Modificar Libro'></a>
           <a href='prueba.php?valor=$codlibro'><img src='img/codigobarras.jpg' title='Generar Codigo de Barras'></a>           
           <a href='prestamoCB.php?valor=$codlibro& valor1=$presta'><img src='img/prestamo.png' title='Prestar Libro'></a>
          
           <a href='eliminar.php?valor=$codlibro'><img src='img/eliminar.png' title='Eliminar Libro'></a>
           
		   </th>
        </tr>";
        
}
echo "</tbody>";
?>
<tfoot>
      <tr>
         <td colspan="6">
      <?php
         $totalPag = ceil($total/$limit);
         $links = array();
         for( $i=1; $i<=$totalPag ; $i++)
         {
            $links[] = "<a href=\"?pag=$i\" class='linkpaginacion'>$i</a>"; 
         }
         echo implode(" - ", $links);
      ?>
         </td>
      </tr>
   </tfoot>
  </table> 
</div>
   <?php
}



function buscar(){
?>
  <div class="contenedorbuscar">
    <form method=POST action='resultadobusqueda.php'> 
      <div class="cajabuscar"><input class="textobuscar" type='text' name='busqueda' placeholder="Libro a buscar"></div>
      <div class="botonbuscar"><input class="boton" type="submit" value="BUSCAR" ></div>
    </form> 
  </div>
<?php
}
function buscarusuario(){
?>
  <div class="contenedorbuscar">
    <form method=POST action='resultadobusquedausuario.php'> 
      <div class="cajabuscar"><input class="textobuscar" type='text' name='busqueda' placeholder="Usuario a buscar"></div>
      <div class="botonbuscar"><input class="boton" type="submit" value="BUSCAR" ></div>
    </form> 
  </div>
<?php
}

 
 
 


function vaciartabla( $Consulta) 

{

$link=Conexion('basededatos');
$R= Ejecutar_Consulta ($link, $Consulta);


if($R){
  ?>
  <script language='javascript'>
  alert('Se han eliminado todos los libros');
   location.href='principal.php';
  </script>
  
  <?php
}

  else{
    ?>
    <script language='javascript'>
    alert('Hubo un error al intentar eliminar los libros' );
  location.href='principal.php';
  </script>
    <?php
  }
}

function ACTUALIZAR_CANTIDAD($VectorLibro){
	$VectorLibro_1 = $VectorLibro[0];
	$VectorLibro_2 = $VectorLibro[1];
	$VectorLibro_3 = $VectorLibro[2];
	$VectorLibro_4 = $VectorLibro[3];
	$VectorLibro_5 = $VectorLibro[4];
	$VectorLibro_6 = $VectorLibro[5];
	$VectorLibro_7 = $VectorLibro[6];
	$VectorLibro_8 = $VectorLibro[7];
	$VectorLibro_9 = $VectorLibro[8];
	$VectorLibro_10= $VectorLibro[9];
	
	/*libro 1*/
	$codigo1 = $VectorLibro_1[0];
	$cant_prestar1 = $VectorLibro_1[1];
	$presta = $VectorLibro_1[8];
	$devuelve = $VectorLibro_1[8];
	$consulta="SELECT * FROM libros2017 where CodLibro = $codigo1"; //selecciona elid del libro de la base de datos y crea una consulta
	$link=Conexion('basededatos'); //conecta con la base de datos
	$R=Ejecutar_Consulta($link,$consulta); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro1=mysqli_fetch_array($R);
	
	/*libro2*/
	$codigo2 = $VectorLibro_2[0];
	$cant_prestar2 = $VectorLibro_2[1];
	$consulta2="SELECT * FROM libros2017 where CodLibro = $codigo2"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta2); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro2=mysqli_fetch_array($R);
	
	/*libro3*/
	$codigo3 = $VectorLibro_3[0];
	$cant_prestar3 = $VectorLibro_3[1];
	$consulta3="SELECT * FROM libros2017 where CodLibro = $codigo3"; //selecciona elid del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta3); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro3=mysqli_fetch_array($R);
	
	/*libro 4*/
	$codigo4 = $VectorLibro_4[0];
	$cant_prestar4 = $VectorLibro_4[1];
	$consulta4="SELECT * FROM libros2017 where CodLibro = $codigo4"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta4); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro4=mysqli_fetch_array($R);
	
	/*libro 5*/
	$codigo5 = $VectorLibro_5[0];
	$cant_prestar5 = $VectorLibro_5[1];
	$consulta5="SELECT * FROM libros2017 where CodLibro = $codigo5"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta5); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro5=mysqli_fetch_array($R);
	
	/*libro 6*/
	$codigo6 = $VectorLibro_6[0];
	$cant_prestar6 = $VectorLibro_6[1];
	$consulta6="SELECT * FROM libros2017 where CodLibro = $codigo6"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta6); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro6=mysqli_fetch_array($R);
	
	/*libro 7*/
	$codigo7 = $VectorLibro_7[0];
	$cant_prestar7 = $VectorLibro_7[1];
	$consulta7="SELECT * FROM libros2017 where CodLibro = $codigo7"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta7); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro7=mysqli_fetch_array($R);
	
	/*libro 8*/
	$codigo8 = $VectorLibro_8[0];
	$cant_prestar8 = $VectorLibro_8[1];
	$consulta8="SELECT * FROM libros2017 where CodLibro = $codigo8"; //selecciona elid del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta8); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro8=mysqli_fetch_array($R);
	
	/*libro 9*/
	$codigo9 = $VectorLibro_9[0];
	$cant_prestar9 = $VectorLibro_9[1];
	$consulta9="SELECT * FROM libros2017 where CodLibro = $codigo9"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta9); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro9=mysqli_fetch_array($R);
	
	/*libro 10*/
	$codigo10 = $VectorHerram_10[0];
	$cant_prestar10 = $VectorLibro_10[1];
	$consulta10="SELECT * FROM libros2017 where CodLibro = $codigo10"; //selecciona el id del libro de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consulta10); // ejecuta una consulta y crea una variable para alojar el resultado
	$libro10=mysqli_fetch_array($R);
	
	if($presta =="presta"){
		$total = $libro1['Cantidad'] - $cant_prestar1;
		$total2 = $libro2['Cantidad'] - $cant_prestar2;
		$total3 = $libro3['Cantidad'] - $cant_prestar3;
		$total4 = $libro4['Cantidad'] - $cant_prestar4;
		$total5 = $libro5['Cantidad'] - $cant_prestar5;
		$total6 = $libro6['Cantidad'] - $cant_prestar6;
		$total7 = $libro7['Cantidad'] - $cant_prestar7;
		$total8 = $libro8['Cantidad'] - $cant_prestar8;
		$total9 = $libro9['Cantidad'] - $cant_prestar9;
		$total10 = $libro10['Cantidad'] - $cant_prestar10;
	}else{
		$total = $libro1['Cantidad'] + $cant_prestar1;
		$total2 = $libro2['Cantidad'] + $cant_prestar2;
		$total3 = $libro3['Cantidad'] + $cant_prestar3;
		$total4 = $libro4['Cantidad'] + $cant_prestar4;
		$total5 = $libro5['Cantidad'] + $cant_prestar5;
		$total6 = $libro6['Cantidad'] + $cant_prestar6;
		$total7 = $libro7['Cantidad'] + $cant_prestar7;
		$total8 = $libro8['Cantidad'] + $cant_prestar8;
		$total9 = $libro9['Cantidad'] + $cant_prestar9;
		$total10 = $libro10['Cantidad'] + $cant_prestar10;
	}
	
	
	if($total < 0 && total > $libro1['Cantidad']  || $total2 < 0 && total2 > $libro2['Cantidad'] || $total3 < 0 && total3 > $libro3['Cantidad'] || $total4 < 0 && total4 > $libro4['Cantidad'] || $total5 < 0 && total5 > $libro5['Cantidad'] || $total6 < 0 && total6 > $libro6['Cantidad'] || $total7 < 0 && total7 > $libro7['Cantidad'] || $total8 < 0 && total8 > $libro8['Cantidad'] || $total9 < 0 && total9 > $libro9['Cantidad'] || $total10 < 0 && total10 > $libro10['Cantidad'] ){
		echo '<script language="javascript">
		alert("La cantidad a prestar de uno de los libros supera el stock total, porfavor revise los Datos ingresados");
		location.href ="prestamoCB.php";
	</script>';
	}else{
		/*Libro 1*/
		$updateLibro1="UPDATE libros2017 SET Cantidad= $total WHERE CodLibro = $codigo1"; //selecciona el id del libro de la base de datos y crea una consulta
		$R= Ejecutar_Consulta ($link, $updateLibro1);
		/*Libro 2*/
		$updateLibro2="UPDATE libros2017 SET Cantidad= $total2 WHERE CodLibro = $codigo2"; //selecciona el d del librode la base de datos y crea una consulta
		$R2= Ejecutar_Consulta ($link, $updateLibro2);
		/*Libro 3*/
		$updateLibro3="UPDATE libros2017 SET Cantidad=   $total3 WHERE CodLibro = $codigo3"; //selecciona el d del librode la base de datos y crea una consulta
		$R3= Ejecutar_Consulta ($link, $updateLibro3);
		/*Libro 4*/
		$updateLibro4="UPDATE libros2017 SET Cantidad  = $total4 WHERE CodLibro = $codigo4"; //selecciona el d del libro de la base de datos y crea una consulta
		$R4= Ejecutar_Consulta ($link, $updateLibro4);
		/*Libro5*/
		$updateLibro5="UPDATE libros2017 SET Cantidad  = $total5 WHERE CodLibro = $codigo5"; //selecciona el d del libro de la base de datos y crea una consulta
		$R5= Ejecutar_Consulta ($link, $updateLibro5);
		/*Libro6*/
		$updateLibro6="UPDATE libros2017 SET Cantidad= $total6 WHERE CodLibro = $codigo6"; //selecciona el d del libro de la base de datos y crea una consulta
		$R6= Ejecutar_Consulta ($link, $updateLibro6);
		/*Libro 7*/
		$updateLibro7="UPDATE libros2017 SET Cantidad= $total7 WHERE CodLibro = $codigo7"; //selecciona el d del libro de la base de datos y crea una consulta
		$R7= Ejecutar_Consulta ($link,$updateLibro7);
		/*Libro 8*/
		$updateLibro8="UPDATE libros2017 SET Cantidad=  $total8 WHERE CodLibro = $codigo8"; //selecciona el d del libro de la base de datos y crea una consulta
		$R8= Ejecutar_Consulta ($link, $updateLibro8);
		/*Libro 9*/
		$updateLibro9="UPDATE libros2017 SET Cantidad= $total9 WHERE CodLibro = $codigo9"; //selecciona el d del libro de la base de datos y crea una consulta
		$R9= Ejecutar_Consulta ($link, $updateLibro9);
		/*Libro 10*/
		$updateLibro10="UPDATE libros2017 SET Cantidad=  $total10 WHERE CodLibro = $codigo10"; //selecciona el d del libro de la base de datos y crea una consulta
		$R10= Ejecutar_Consulta ($link, $updateLibro10);
		/*se inserta el prestamo*/
		INSERT_PRESTAMO($VectorLibro);
		header('location:principal.php');
	}
	
}

/*MetaPrestamoCB*/
function INSERT_PRESTAMO($VectorLibro){
$link=Conexion('basededatos'); //conecta con la base de datos
$VectorLibro_1 = $VectorLibro[0];
$VectorLibro_2 = $VectorLibro[1];
$VectorLibro_3 = $VectorLibro[2];
$VectorLibro_4 = $VectorLibro[3];
$VectorLibro_5 = $VectorLibro[4];
$VectorLibro_6 = $VectorLibro[5];
$VectorLibro_7 = $VectorLibro[6];
$VectorLibro_8 = $VectorLibro[7];
$VectorLibro_9 = $VectorLibro[8];
$VectorLibro_10= $VectorLibro[9];
if($$VectorLibro_1[8] == "presta"){
/*Se carga los Datos del libro 1 si existe*/
if($VectorLibro_1!==''){
$consulta="INSERT INTO prestamos (
CodLibro, titulo,	cant_existente,	cant_prestada,	fecha_prestamo,	alumno, docente
)
VALUES (
'$VectorLibro_1[0]', 
'$VectorLibro_1[1]', 
'$VectorLibro_1[2]', 
'$VectorLibro_1[3]', 
'$VectorLibro_1[4]', 
'$VectorLibro_1[5]', 
'$$VectorLibro_1[6]', 
'$VectorLibro_1[7]'
) ";
$R= Ejecutar_Consulta ($link, $consulta);
}
/*Se carga los Datos del libro  2 si existe*/
if($VectorLibro_2[0]!==''){
$consulta2="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest)
VALUES (
'$VectorLibro_2[0]', 
'$VectorLibro_2[1]', 
'$VectorLibro_2[2]', 
'$VectorLibro_2[3]', 
'$VectorLibro_2[4]', 
'$VectorLibro_2[5]', 
'$VectorLibro_2[6]', 
'$VectorLibro_2[7]'
) ";

$R2= Ejecutar_Consulta ($link, $consulta2);
}
/*Se carga los Datos del libro  3 si existe*/
if($VectorLibro_3[0]!==''){
$consulta3="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_3[0]', 
'$VectorLibro_3[1]', 
'$VectorLibro_3[2]', 
'$VectorLibro_3[3]', 
'$VectorLibro_3[4]', 
'$VectorLibro_3[5]', 
'$VectorLibro_3[6]', 
'$VectorLibro_3[7]'
) ";

$R3= Ejecutar_Consulta ($link, $consulta3);
}
/*Se carga los Datos del libro  4 si existe*/
if($VectorLibro_4[0]!==''){
$consulta4="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_4[0]', 
'$VectorLibro_4[1]', 
'$VectorLibro_4[2]', 
'$VectorLibro_4[3]', 
'$VectorLibro_4[4]', 
'$VectorLibro_4[5]', 
'$VectorLibro_4[6]', 
'$VectorLibro_4[7]'
) ";

$R4= Ejecutar_Consulta ($link, $consulta4);
}
/*Se carga los Datos del libro  5 si existe*/
if($VectorLibro_5[0]!==''){
$consulta5="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_5[0]', 
'$VectorLibro_5[1]', 
'$VectorLibro_5[2]', 
'$VectorLibro_5[3]', 
'$VectorLibro_5[4]', 
'$VectorLibro_5[5]', 
'$VectorLibro_5[6]', 
'$VectorLibro_5[7]'
) ";

$R5= Ejecutar_Consulta ($link, $consulta5);
}

/*Se carga los Datos del libro 6 si existe*/
if($VectorLibro_6[0]!==''){
$consulta6="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_6[0]', 
'$VectorLibro_6[1]', 
'$VectorLibro_6[2]', 
'$VectorLibro_6[3]', 
'$VectorLibro_6[4]', 
'$VectorLibro_6[5]', 
'$VectorLibro_6[6]', 
'$VectorLibro_6[7]'
) ";

$R6= Ejecutar_Consulta ($link, $consulta6);
}

/*Se carga los Datos del libro 7 si existe*/
if($VectorHerram_7[0]!==''){
$consulta7="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_7[0]', 
'$VectorLibro_7[1]', 
'$VectorLibro_7[2]', 
'$VectorLibro_7[3]', 
'$VectorLibro_7[4]', 
'$VectorLibro_7[5]', 
'$VectorLibro_7[6]', 
'$VectorLibro_7[7]'
) ";

$R7= Ejecutar_Consulta ($link, $consulta7);
}

/*Se carga los Datos del libro 8 si existe*/
if($VectorLibro_8[0]!==''){
$consulta8="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_8[0]', 
'$VectorLibro_8[1]', 
'$VectorLibro_8[2]', 
'$VectorLibro[3]', 
'$VectorLibro_8[4]', 
'$VectorLibro_8[5]', 
'$VectorLibro_8[6]', 
'$VectorLibro_8[7]'
) ";

$R8= Ejecutar_Consulta ($link, $consulta8);
}

/*Se carga los Datos del libro 9si existe*/
if($VectorLibro_9[0]!==''){
$consulta9="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_9[0]', 
'$VectorLibro_9[1]', 
'$VectorLibro_9[2]', 
'$VectorLibro_9[3]', 
'$VectorLibro_9[4]', 
'$VectorLibro_9[5]', 
'$VectorLibro_9[6]', 
'$VectorLibro_9[7]'
) ";

$R9= Ejecutar_Consulta ($link, $consulta9);
}

/*Se carga los Datos del libro 10si existe*/
if($VectorLibro_10[0]!==''){
$consulta10="INSERT INTO prestamos (
CodLibro,	Apellido_Prest,	Cant_Prest,	Nombre_Prest,	Libro_Prest,	Curso_Div_Prest,Fecha_Hora_Prest,	Estado_Prest
)
VALUES (
'$VectorLibro_10[0]', 
'$VectorLibro_10[1]', 
'$VectorLibro_10[2]', 
'$VectorLibro_10[3]', 
'$VectorLibro_10[4]', 
'$VectorLibro_10[5]', 
'$VectorLibro_10[6]', 
'$VectorLibro_10[7]'
) ";

$R10= Ejecutar_Consulta ($link, $consulta10);
}
}
else if($VectorLibro_1[8] == "devuelve"){
	/*Libro 1*/
	$consultareg="SELECT * FROM prestamos where CodLibro = $VectorLibro_1[0]"; //selecciona el id_herramientas de la base de datos y crea una consulta
	$R=Ejecutar_Consulta($link,$consultareg); // ejecuta una consulta y crea una variable para alojar el resultado
	$registro=mysqli_fetch_array($R);
	$totalRL1 = $VectorLibro_1[1] - $registro['Cant_Presta'];
	if($VectorLibro_1!==''){
	$updatel1="UPDATE prestamos SET Cant_Prest = $totalRL1 WHERE CodLibro = $VectorLibro_1[0]"; //selecciona el id_herramientas de la base de datos y crea una consulta
	$R2= Ejecutar_Consulta ($link, $updatel1);
	}
}
/*Se comprueba que la consulta se realizo*/

}



function motrar_tabla_auditoria(){
	
	
	
 $Enlace=Conexion('basededatos');

// maximo por pagina
$limit = 7;

// pagina pedida


if (isset($_GET["pag"])) {
$pag = (int) $_GET["pag"];
} else {
$pag= "";
}
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;


$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM auditoria LIMIT $offset, $limit";
$sqlTotal = "SELECT FOUND_ROWS() as total";

$resultado= mysqli_query($Enlace,$sql);
$rsTotal = mysqli_query($Enlace,$sqlTotal);

$rowTotal = mysqli_fetch_assoc($rsTotal);
// Total de registros sin limit
$total = $rowTotal["total"];

?>

<?php
echo "<div class='cajatabla'>
      <table>
        <thead>
        <tr>
		 <td>Usuario</td>
          <td>Fecha</td>
		  <td>Accion</td>
		  <td>Detalle de <br> Accion</td>
          
        </tr>
        </thead>
        <tbody>
		
		";

while ($fila=mysqli_fetch_assoc($resultado)){ 
  // <link rel='stylesheet' href='css/estilos1.css'/> 
// echo "<table border='1' id='mostrartablalibros2017'>"; 
  
  $Usuario=$fila['usuario'];
   $Fecha=$fila['fecha'];
  $Accion=$fila['acciones'];
  $Detalle=$fila['DescripAcciones'];
 
  
  
  

 
 


  echo "<tr>
           <td>$Usuario</td>
           <td>$Fecha</td>
		   <td>$Accion</td>
		    <td>$Detalle</td>
          
           

        </tr>"; 
        
}
echo "</tbody>";
?>
<tfoot>
      <tr>
         <td colspan="6">
      <?php
         $totalPag = ceil($total/$limit);
         $links = array();
         for( $i=1; $i<=$totalPag ; $i++)
         {
            $links[] = "<a href=\"?pag=$i\" class='linkpaginacion'>$i</a>"; 
         }
         echo implode(" - ", $links);
      ?>
         </td>
      </tr>
   </tfoot>
  </table> 
</div>
   <?php
}



?>