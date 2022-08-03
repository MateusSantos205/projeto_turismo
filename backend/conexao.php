<?php

try{

    // dados da conexao com o DB
    define('SERVIDOR','localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('BASEDADOS','db_turismo');

    $con = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS, USUARIO, SENHA);
     // set the PDO error mode to exception
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Conectado com Sucesso!";

}catch(PDOException $error){
    echo " Erro ao conectar com o banco de dados".$error->getMessage();
}

?>