<?php

	include("../vistas/scripts/Alerta.php");
     if (isset($_POST['borrando_tarea'])){
     		if (isset($_SESSION['token'])){
   			 $token = new Token($_SESSION['token']);
   			 $error = $token->EliminarTarea($_POST['borrando_tarea']);
   			 $alert = new Alerta("Su Tarea ha sido eliminada correctamente,","Actualice la lista para ver el cambio");
             $alert->mostrar();
            }
	}

?>
