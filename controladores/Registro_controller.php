<?php

include("../Usuario.php");
include("../Alerta.php");


if (isset($_POST["enviando"])) {


  $usuario = new Usuario();
  $usuario = Usuario::conRegistro($nombrep,$apellido,$nombre,$pass,$pass2,$email,$nacimiento);
  $codigo = $usuario->transformToJson_registro();


  switch ($codigo) {

    case '4':
    #USUARIO YA EXISTE
    $alert = new Alerta("No puedes registrarte", ",Ese usuario ya existe");
    $alert->mostrar();
    break;

    case '24':
    #MENOR A 18
    $alert = new Alerta("No puedes registrarte", ",Eres menor de edad");
    $alert->mostrar();
    break;

    case '5':
    #CORREO EN USO
    $alert = new Alerta ("No puedes registrarte", ",Ese correo ya está en uso");
    $alert->mostrar();
    break;

    case '10':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte", ",Muchos caracteres en el nombre de usuario");
    $alert->mostrar();
    break;

    case '17':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte", ",Muchos caracteres en el nombre");
    $alert->mostrar();
    break;

    case '20':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte", ",Muchos caracteres en el apellido");
    $alert->mostrar();
    break;

    case '13':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte", ",Esa Contraseña es demasiado larga");
    $alert->mostrar();
    break;

    case '9':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte", ",Ese correo es muy largo");
    $alert->mostrar();
    break;

    case '0':
    #OK...
    $url='Inicio.php';
    header("Location: $url");
    break;

    default:
    $alert = new Alerta ("Algo salió mal :(", ", Los servicios de Done no están disponibles");
    break;
  }

}

?>
