<!--Formulario de prueba-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Done! - Iniciar Sesión</title>

<!--fuentes de google-->
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
<link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->

<!--Hojas de estilo-->
<link rel ="stylesheet" href="estilos.css"/>
<!--aqui hay dos hojas, una para las pruebas y otra que se puede usar-->
<!--<link rel="stylesheet" href="estilos3.css"/>-->



</head>

<body>

  <!-- <img class="logo" src="Logo.jpg">-->

   <h1>Ejemplo de Inicio</h1> <!--titulo-->

   <h2>Entrar</h2>
<!---inicia el formulario-->

<!--<form method="post" name="datos_usuario" id="datos_usuario" autocomplete="off">-->

  <form  action="Inicio.php" method="POST">
   <table align = "right">
    <tr>
      <td id ="identificadorentrada">Nombre de Usuario</td>
      <td><label for="nombre_usuario"></label>
      <input type="text" name="nombre_usuario" id="nombre_usuario"  placeholder="Usuario" autocomplete="off"></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Contraseña</td>
      <td><label for="contrasena_usuario"></label>
      <input type="password" name="contrasena_usuario" id="constrasena_usuario"  placeholder="Constraseña" autocomplete="off"></td>
    </tr>

    <tr>
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
      <td>&nbsp;</td>
    </tr>

  <tr>
  <td colspan="2" align="center"><input name="enviando" type="submit" class="boton" value="Entra"/> <td>
  </tr>

</table>

</form>

<!---termina el formulario de inicio-->


<h3>Done!</h3>

<ul>

<li><img id ="icono" src="cloud.svg" height="40" width="40"/><b id="descripcion_icon">Si ya tienes una cuenta inicia sesión para ver tus tareas.</b></li>
<li><img id ="icono" src="smartphone.svg" height="40" width="40"/><b id="descripcion_icon">Disponible en dispositivos Android.</b></li>

</ul>




<?php
  function transformToJson($usuario, $clave){
          $data = array(
            'username' => $usuario,
            'password' => $clave,
          );
          $json = json_encode($data);
          $url = 'https://intense-lake-39874.herokuapp.com/usuarios/login';
          //Iniciar cURL
          $ch = curl_init($url);
          
          //Decir a curl que se quiere mandar un POST
          curl_setopt($ch, CURLOPT_POST, 1);
          //Adjuntar el json string al POST
          curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
          //Configurar el content type a application/json
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          
          curl_exec($ch);
          
          if (!curl_errno($ch)) {
            switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
              case 200: #OK
                break;
              case 400: echo 'Bad request';
                break;
              case 404: echo 'Not found';
                break;
              default: echo 'Código http inesperado: ', $http_code, "\n";
            }
          }
          echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_getinfo($ch, CURLINFO_HTTP_CODE);
          
          curl_close($ch);
        }
 include ("Usuario.php");
 include ("Validador.php");
 $nombre=' ';
 $clave=' ';
 //$validador = new Validador("usuarios.json");
 if (isset($_POST["enviando"])) {
  $nombre=$_POST["nombre_usuario"];
  $clave=$_POST["contrasena_usuario"];
 //if ($validador->validarinicio($nombre)){
   //echo "<p class='validado'> Puedes entrar </p>";
 //}
 //else echo "<p class='no_validado'> No puedes entrar </p>";
  transformToJson($nombre,$clave);
 }
?>

</body>

</html>