<?php


function randomString($tipo){
  //generar la longitud
  $longitud = rand(10,50);

    $carac = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

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

$email=$_POST["email_usuario"];

$correo = new Correo($email);
$correo->enviarNuevaContrasena_generada(randomString(""));


$nuevacontra = randomString("");

}


?>
