<?php

// include da conexão com o banco de dados
    include'conexao.php';
// final da conexão

try{
    // exibe as variaveis globais recebidas via POST

    // echo"<pre>";
    // var_dump($_FILES);
    // echo"<pre>";
    //  exit/


    // variaveis que recebem os dados enviados via POST
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];
    $imagem = $_FILES['imagem'];

    // ////////////////////////////////////////////////////////////////////////
    // Upload da imagem
    // Caminho onde a imagem esera armazenada

    $pasta = '../img/upload/';

// Define um novo nome da imagem para upload
    $imagem = 'imagem.jpg';

    // Função PHP que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$imagem);

    exit;

    // ////////////////////////////////////////////////////////////////////////

    // variaveis que recebe a query que sera executada no banco de dados
    $sql = "INSERT INTO tb_viagens (`titulo`,`local`,`valor`,`desc`) values ('$titulo', '$local', '$valor', '$desc')";

    // prepara a execução da query sql acima
    $comando = $con->prepare($sql);

    // executa o comando com a query no BD
    $comando->execute();

    // exibe uma mensagem ao inserir
    // echo "Cadastro realizado com sucesso!";

    header('location:  ../admin/gerenciar_viagens.php');

    // fechar conexão
    $con = null;

}catch(PDOException $error){
    echo $erro->getMessage();

    die();
}

?>