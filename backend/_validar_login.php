<?php

include '../backend/conexao.php';

try{
// //////////////////////////////
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
// //////////////////////////////
                                                        // BINARY deixa a senha Case Sensitive
    $sql = "SELECT *FROM tb_login WHERE email='$usuario' AND BINARY senha = '$senha' AND ativo = 1";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($dados);

    // Verifica se existem registros dentro da variavel $dados

    if($dados != null){  // "!=" diferente php
    // se, usuario e senha foram validos, irá entrar nesse trecho de codigo

    // inicia a sessão
    session_start();

    // criar uma variavel de sessao e adiciona o email digitado
    $_SESSION['usuario'] = $usuario;

    // exibe o valor adicionado na variavel de sessao email
    var_dump($_SESSION['usuario']);

    header('location: ../admin/gerenciar_viagens.php');

    
    }else{
        // se, usuario e senha for invalidos, irá entrar nesse trecho de codigo

        echo "Usuario ou senha invalidos";
        // header('location: ../admin/gerenciar_viagens.php');
    }

   
    

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>
