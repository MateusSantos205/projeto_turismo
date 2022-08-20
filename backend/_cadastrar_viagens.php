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
    // descobrir a extenção da imagem
    // formatos validos: jpg/jpeg/png

    $nome_original_imagem = $_FILES['imagem']['name'];

    $extensao = pathinfo($nome_original_imagem, PATHINFO_EXTENSION);

    // verificação de extensão da imagem, se for diferente dos formatos validados, irá retornar erro aom usuario 
   if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
    
    echo 'Formato de imagem Inválido';

    exit;

   }

    // gera um nome aleatorio para a imagem(hash)
    // a função uniqid gera um hash aleatorio baseado no tempo em micrisegundos, mas ela nao é confiavel
    // utilizamos o nome temporario da imagem gerado pelp php mais o uniqid para incrementar o codigo
    // utilizamos p md5 para gerar outro hash baseado no uniqid(nome temp + uniqid)
    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true)); 
    
    $nome_final_imagem = $hash.'.'.$extensao;

    // Caminho onde a imagem esera armazenada
    $pasta = '../img/upload/';

// Define um novo nome da imagem para upload
    // $imagem = 'imagem.jpg';

    // Função PHP que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    // juntamos o hash

    // ////////////////////////////////////////////////////////////////////////

    // variaveis que recebe a query que sera executada no banco de dados
    $sql = "INSERT INTO tb_viagens (`titulo`,`local`,`valor`,`desc`, `imagem`) values ('$titulo', '$local', '$valor', '$desc', '$nome_final_imagem')";

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