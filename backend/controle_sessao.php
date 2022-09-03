<?php

session_start();

$usuario = $_SESSION['usuario'];

if($usuario == null){
    header('Location: index.php');
    exit;
}

?>