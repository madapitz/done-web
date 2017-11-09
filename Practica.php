<!--Formulario de prueba-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Done!</title>
	
<!--fuentes de google-->
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">

<style>
	 h1{
		 text-align:center;
		 font-family: 'Quicksand', sans-serif;
		 color: white;
		 background-color: #666;
		 width: 50%;
		 text-align: center;
		 margin: auto;
		 margin-bottom: 15px;
		 margin-top: 0;
		 border-radius: 5px;
		 padding: 5px;
	}
	table{
		background-color:#0094FF;
		padding:5px;
		/*border:#666 3px solid;*/
		width: 30%;
                border-radius: 0px 0px 10px 10px;
                /*margin: 20px auto;*/
	}
	.no_validado{
		font-size:18px;
		color:#F00;
		font-weight:bold;
	}
	.validado{
		font-size:18px;
		color:#0C3;
		font-weight:bold;
	}
	#identificadorentrada,h2{
		font-family: 'Quicksand', sans-serif;
                background-color: #0094FF;
	}
  h2{
               text-align: center;
		color: white;
		width: 30%;
		margin : auto;
		padding-bottom: 10px;
		padding-top: 10px;
		border-bottom: white 5px solid;
  }
	#identificadorentrada {
		 /*font-weight: bold;*/
		 text-align:left;
		 padding-left: 5px;
		 margin-bottom: 20px;
		 color:white;
	}
	input, textarea, select, button {
	  width : 160px;
		color: #626262;
		background-color: #FFF;
	  margin: 0;
    font-family: 'Space Mono', monospace;
		border: none;
		margin-bottom: 10px;
		margin-top: 10px;
		-webkit-box-sizing: border-box; /* Para google chrome */
			 -moz-box-sizing: border-box; /* para mozilla firefox */
				-ms-box-sizing: border-box; /* internet explorer, edge */
				-o-box-sizing: border-box; /* opera */
						box-sizing: border-box; /* otros */
	}
	input[type=submit]:hover{
	background-color: #D2F9FF;
	}
	input[type=submit]:focus{
	background-color: #9FF1FE;
  color: black;
  }
::-webkit-input-placeholder { /* google chrome y edge */
    color:    #CDCDCD;
		padding-left: 5px;
}
</style>

</head>

<body>
<h1>Done! -- Manage your taks</h1> <!--titulo-->

<h2>Ejemplo de formulario de registro</h2>

<!---inicia el formulario-->
<form method="post" name="datos_usuario" id="datos_usuario" autocomplete="off">


  <table align="center">

    <tr>
      <td id ="identificadorentrada">Email</td>
      <td><label for="email_usuario"></label>
      <input type="email" name="email_usuario" id="email_usuario" placeholder="Introduzca un email válido"></td>
    </tr>

    <tr>
      <td id ="identificadorentrada">Nombre de usuario</td>
      <td><label for="nombre_usuario"></label>
      <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Elija nombre de usuario"></td>
    </tr>

    <tr>
      <td id ="identificadorentrada">Contraseña</td>
      <td><label for="contrasena_usuario"></label>
      <input type="password" name="contrasena_usuario" id="constrasena_usuario" placeholder="Elija constraseña"></td>
    </tr>

    <tr>
      <td id ="identificadorentrada">Repetir contraseña</td>
      <td><label for="contrasena_usuario_repetir"></label>
      <input type="password" name="contrasena_usuario_repetir" id="constrasena_usuario_repetir" placeholder="Verificar contraseña"></td>
    </tr>

    <tr>
      <td id ="identificadorentrada">Edad</td>
      <td><label for="edad_usuario"></label>
      <input type="number" max="100" min="18" name="edad_usuario" id="edad_usuario" placeholder="Edad"></td>
    </tr>

    <tr>
      <td id ="identificadorentrada">Fecha de nacimiento</td>
      <td><label for="fecha_nacimiento"></label>
      <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"></td>
    </tr>

    <tr>
      <datalist id ="generos">
      <option value="Mujer">
      <option value="Hombre">
      </datalist>
      <td id ="identificadorentrada">Genero</td>
      <td><label for="genero_usuario"></label>
      <input type="text" name="genero_usuario" id="genero_usuario" list="generos"></td>
    </tr>

    <tr>
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
    </tr>

    <tr>
      <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Iniciar"></td>
    </tr>

  </table>
</form>
<!---termina el formulario-->


<?php
    class usuario{
    	private $email;
    	private $nombre;
    	private $edad;
    	private $contrasena;
    	private $genero;
    	private $nacimiento;
    	function usuario(){
			$this->nombre = $_POST["nombre_usuario"]; // $post es una variable superglobal de psp (array)
			$this->edad=$_POST["edad_usuario"];
      		$this->contrasena=$_POST["contrasena_usuario"];
      		$this->contrasena_2=$_POST["contrasena_usuario_repetir"];
      		$this->email=$_POST["email_usuario"];
      		$this->nacimiento=$_POST["fecha_nacimiento"];
      		$this->genero=$_POST["genero_usuario"];
    	}
        function getnombre(){        	
        	return $this->nombre;
        }
        function getedad(){
        	return $this->edad;
        }
        function getcontrasena(){
        	return $this->contrasena;
        }
        function getcontrasena_2(){
        	return $this->contrasena_2;
        }
        function getemail(){
        	return $this->email;
        }
        function getnacimiento(){
        	return $this->nacimiento;
        }
        function getgenero(){
        	return $this->genero;
        }
       }
       if (isset($_POST["enviando"])){ //comprueba si hemos pulsado el boton enviar
    	    $usuario= new usuario();
			//$nombre = $_POST["nombre_usuario"]; // $post es una variable superglobal de psp (array)
			//$edad=$_POST["edad_usuario"];
            //$contrasena=$_POST["contrasena_usuario"];
        	//$contrasena_2=$_POST["contrasena_usuario_repetir"];
      		//$email=$_POST["email_usuario"];
      		//$nacimiento=$_POST["fecha_nacimiento"];
      		//$genero=$_POST["genero_usuario"];
      		/*con las dos lineas de codigo anteriores lo que estamos haciendo es
			 *asignarle a una variable local de php lo que el usuario introdujo
			 *en el nombre_usuario, que es almacenado automaticamente en el
			 *$POST_*/
			 echo "<br><br>Lo que se registró:";
 			 echo "<br> Nombre del usuario: ".$usuario->getnombre()."<br>";
 			echo "<br> Edad del usuario: ".$usuario->getedad()."<br>";
 			echo "<br> Constraseña del usuario: ".$usuario->getcontrasena()."<br>";
 			echo "<br> Contrasena del usuario (intento 2): ".$usuario->getcontrasena_2()."<br>";
 			echo "<br> Email: ".$usuario->getemail()."<br>";
 			echo "<br> Nacimiento: ".$usuario->getnacimiento()."<br>";
 			echo "<br> Genero del usuario: ".$usuario->getgenero()."<br>";
		}
?>

</body>
</html>