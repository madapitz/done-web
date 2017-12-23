<?php


function enviarcontrasena($contrasena){ // manda la contrasena generada a los de rest y ellos la cambian en el usuario
  //generar arreglo
  $data = array(
    'password' => $contrasena,
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
      case 400: echo '<br> Bad request';
        break;
      case 404: echo '<br> Not found';
        break;
      default: echo '<br> Código http inesperado: ', $http_code, "\n";
    }
  }

else {
  echo "error con el servidor";
}
  echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
}





function randomString($tipo){
  //generar la longitud
  $longitud = rand(10,50);
  // Seleccionamos el tipo de caracteres que deseas que devuelva el string
     switch ($tipo) {
         case 'num':
             // Solo cuando deseas que devuelva numeros.
             $carac = '1234567890';
             break;
         case 'lower':
             // Solo cuando deseas que devuelva letras en minusculas.
             $carac = 'abcdefghijklmnopqrstuvwxyz';
             break;
         case 'upper':
             // Solo cuando deseas que devuelva letras en mayusculas.
             $carac = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
             break;
         default:
             //el default que dice que puede estar compuesta de letras mayusculas, minusculas y numeros
             $carac = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
             break;
     }
    $rand = '';
    $i = 0;
    while ($i < $longitud) {
        //Loop hasta que el string aleatorio contenga la longitud ingresada.
        $num = rand() % strlen($carac);
        $tmp = substr($carac, $num, 1);
        $rand = $rand.$tmp;
        $i++;
    }
    //Retorno del string aleatorio.
    return $rand;
}



include("../Correo.php"); //incluir la clase Correo.php para mandar el mail
if (isset($_POST['email_usuario'])){ // si introducido email

$email=$_POST["email_usuario"]; //aqui se supone que se debe mandar el email al usuario con la nueva contrasena


$correo = new Correo($email);
$correo->enviarNuevaContrasena(randomString(""));


$nuevacontra = randomString("");
enviarcontrasena($nuevacontra);
}



?>
