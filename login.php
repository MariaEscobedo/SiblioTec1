<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css1/estilolog.css"> 
	
    </head>

<body>
    <center>
	
   <section>
   <div class="login-box">
      <h1>Bienvenido a SiblioTec</h1>
   <img class="avatar" src="imag/LOGO.png" alt="Logo de St">

        <form  action="metadatos.php" method="POST"> <!--php para validar -->
		
              
			<label form="Username">Username </label><br>
            <input type="text" name="User" placeholder="&#128272 Usuario" ><br> <!--crea la caja de texto con el nombre Usuario-->
            
			<label form="Password">Password </label><br>
            <input type="password" name="Pass" placeholder="&#128272 Contraseña"><br><br> <!-- mantiene sifrada la contraseña-->
            
            <input type="submit" name="Enviar"><br><br><!--creacion del boton -->
			
		

        </form>
    </div>
    </section>
    </center>
</body>


<br><br><br>
<footer>
<br>
        <p ALIGN="center">Autores: Escobedo Maria, Hoyos Rita 7°1</p>
            <p ALIGN="center"> EEST N°1 Grand Bourg, 2018</p>   
</footer>

</html>