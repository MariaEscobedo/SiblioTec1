<?php
 session_start(); //Inicio de sesion
 include 'Db.php'; //enlaza al archivo Db.php
 if (isset($_POST['User'])) //chequeo que contenga algun valor  la caja de texto de usuario (lo que viene del archivo login)
	
       $User=$_POST['User'];// si se cumple la condicion (que contenga algo)
    
	else $User= '';// si no tiene valor, es decir si tiene valor NULL , guardo un espacio vacio
	

	if (isset($_POST['Pass'])) 
	    
		$Pass=$_POST['Pass'];	
	
    else $Pass= '';
$consulta="SELECT * FROM usuario WHERE User='$User' AND Pass='$Pass' "; //Realiza una consulta de sql a la base de datos
$link=Conexion('basededatos'); //Conexion a la base de datos
$R=Ejecutar_Consulta($link, $consulta); //Hace la relacion entre la consulta y los datos ingresados, y confirma que estos son iguales
$matriz=mysqli_fetch_array($R); //Convierte el resultado de la consulta en una matriz
 


 if($matriz){ //Inicio de la matriz
 	$Userie=$matriz['User'];
    $Passbase=$matriz['Pass'];
 	$DNI=$matriz['DNI'];
 	$nombre=$matriz['Nombre'];
 	$apellido=$matriz['Apellido'];
 	$cargo=$matriz['Cargo'];
    $imagen=$matriz['Imagen']; 
 $_SESSION['Apellido']=$apellido; //Llama a los datos alojados en la base de datos, para ser mostrados posteriormente
 $_SESSION['Nombre']=$nombre; // Llama a los datos alojados en la base de datos, para ser mostrados posteriormente
 $_SESSION['Cargo']=$cargo; //Llama a los datos alojados en la base de datos, para ser mostrados posteriormente
 $_SESSION['DNI']=$DNI;//Llama a los datos alojados en la base de datos, para ser mostrados posteriormente
 $_SESSION ['User']=$Userie;// de la fila levanto solo el user y lo muestro
 $_SESSION ['Pass']=$Passbase;
 $_SESSION['Imagen']=$imagen;
 }
 
ValidarUseyPass($User,$Pass,$Userie,$Passbase,$matriz);

 ?>