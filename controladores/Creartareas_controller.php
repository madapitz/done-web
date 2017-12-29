<?php

  include("../Usuario.php");
  include("../Alerta.php");
  include("../Token.php");


if (isset($_SESSION['token'])){
    $token = new Token($_SESSION['token']);


      if (isset($_POST['creando_tarea'])){

          $titulo = $_POST['titulo_tarea'];
          $descripcion = $_POST['descripcion_tarea'];


          $token->PostTareas($titulo,$descripcion);

      }

}


?>
