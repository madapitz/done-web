<!DOCTYPE html>
<html>
<head>
  <title>Done!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="estiloPagTareas.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="https://use.fontawesome.com/5643167d36.js"></script>

</head>
<body>





<nav id="fondo" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Brand -->
  <a id="logo" class="navbar-brand" href="bienvenido.php">Done!</a>
  <!-- Links -->
  <ul class="navbar-nav">
    <!-- Dropdown -->
    <li class="nav-item dropdown" >
      <a class="objeto nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Crear tarea</a>
        <a class="dropdown-item" href="#">Crear lista de tareas</a>
        <a class="dropdown-item" href="#">Ver lista de tareas</a>
        <a class="dropdown-item" href="#">Ver perfil</a>
        <a class="dropdown-item" href="Logout.php">Cerrar Sesión</a>
      </div>
    </li>
  </ul>
</nav>




<!-- Barra lateral -->
<div id="barra-lateral">
			<div id="logo-menu">
			</div>

			<div id="contenedor-logos-primero" class="contenedor-logos">
				<div class="logo-perfil">
				</div>
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
      <div class="logo-ayuda">
      </div>
      <p class="title-menu">ayuda</p>
     </div>

     <div class="contenedor-logos">
     <div class="logo-config">
     </div>
     <p class="title-menu">configuracion</p>
    </div>

			<div id="foto">
		<img id="foto-contenedor-1" src="pictures/screen.png"/>
	</div>
</div>










</body>
</html>
