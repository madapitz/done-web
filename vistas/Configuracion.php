<!--Pagina de configuracion / cambiar contraseña -->
<!DOCTYPE html>
<html>
<head>
  <title>Done! - cambiar contraseña</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../views/images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../views/styles/estiloPagTareas.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="https://use.fontawesome.com/5643167d36.js"></script>

</head>


<body style ="background-image:none; background-color: #D8D8D8;">



<!-- Container completo -->
<section class = "container">
  <nav id="fondo" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <!-- Logo -->
    <a id="logo" class="navbar-brand" href="bienvenido.php">Done!</a>
    <!-- Links del menu desplegable -->
    <ul class="navbar-nav">
      <!-- Menu desplegable -->
      <li class="nav-item dropdown" >
        <a class="objeto nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="Creartareas.php">Crear tarea</a>
          <a class="dropdown-item" href="#">Crear lista de tareas</a>
          <a class="dropdown-item" href="#">Ver lista de tareas</a>
          <a class="dropdown-item" href="Perfil.php">Ver perfil</a>
          <a class="dropdown-item" href="../controladores/logout_controller.php">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </nav>
</section>




<!-- Barra lateral -->
<div id="barra-lateral">

			<div id="logo-menu">
			</div>

	<div id="contenedor-logos-primero" class="contenedor-logos" >

    <a href ="bienvenido.php">
		<div class="logo-perfil">
			</div>
    </a>

        <?php
          session_start();
          if (isset($_SESSION['username'])){ ?>
            <p class="title-menu"><?php echo $_SESSION['username'];?></p>
            <?php
          }else{
            header('Location: Inicio.php');
          }
          ?>

	</div>

      <div class="contenedor-logos">
        <a href ="Ayuda.php">
      <div class="logo-ayuda">
      </div>
       </a>
      <p class="title-menu">ayuda</p>
     </div>

     <div class="contenedor-logos">
       <a href ="Configuracion.php">
     <div class="logo-config">
     </div>
      </a>
     <p class="title-menu">Configuración</p>
    </div>
</div>

<head>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
  <link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel ="stylesheet" href="../views/styles/estilos.css"/>
</head>

<!---inicia el formulario-->
 <tr>
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
 </tr>
<section class ="container">
  <table style= "margin-left: 15%;">
  <h2>Cambiar Contraseña</h2>

  <form  action="Configuracion.php" method="POST">
   
    <tr>
      <td id ="identificadorentrada">Contraseña Vieja</td>
      <td><label for="nombre_usuario"></label>
      <input type="password" name="contrasena_vieja" id="contrasena_vieja"  placeholder="Contraseña" autocomplete="off" required></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Contraseña Nueva</td>
      <td><label for="contrasena_usuario"></label>
      <input type="password" name="contrasena_usuario" id="constrasena_usuario"  placeholder="Constraseña" autocomplete="off" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
      <td>&nbsp;</td>
    </tr>
  <tr>
  <td colspan="2" align="center"><input name="enviando" type="submit" class="boton" value="Cambiar"/> <td>
  </tr>

     </form>

  </table>
 </section>

  <?php
   include("../Alerta.php");
   include("../modelos/Token.php");
   if (isset($_POST["enviando"])) {
      $viejaclave=$_POST["contrasena_vieja"];
      $nuevaclave=$_POST["contrasena_usuario"];
      if (isset($_SESSION['token'])){ 
        $token = new Token($_SESSION['token']);
        $respuesta = $token->CambiarClave($viejaclave,$nuevaclave);
        switch ($respuesta) {
          case '2':
          # code...
          $alert = new Alerta("Vieja Contraseña incorrecta", ", Revise e intentelo de nuevo");
          $alert->mostrar();
            break;
          case '16':
           #LIMITE CARACTERES
          $alert = new Alerta ("Error,", "La nueva Contraseña debe ser menor a 50 caracteres");
          $alert->mostrar();
            break;
          case '15':
           #LIMITE CARACTERES
          $alert = new Alerta ("Error,", "La nueva Contraseña debe ser mayor a 8 caracteres");
          $alert->mostrar();
            break;
          case '0':
          #LIMITE CARACTERES
          $alert = new Alerta ("Correcto,", "Su contraseña ha sido cambiada correctamente");
          $alert->mostrar();
            break;
          default:
            $alert = new Alerta ("Algo salió mal :(", ", Los servicios de Done no están disponibles");
            break;
        }
      }
   }
  ?>

</body>
</html>

