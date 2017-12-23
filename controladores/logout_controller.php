<?php
@session_start();
session_destroy();

include("../Token.php");


$token = new Token($_SESSION['token']);
$token->BorrarToken();

header("Location: ../index.php");
?>
