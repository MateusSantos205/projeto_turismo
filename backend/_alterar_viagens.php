<?php

include 'conexao.php';

try {
    // variaveis recebidas via post

    $id = $_POST['id'];

    $titulo = $_POST['titulo'];

    $local = $_POST['local'];

    $valor = $_POST['valor'];

    $desc = $_POST['desc'];



    // ///////////////////////////////////////////////////////

    $nome_original_imagem = $_FILES['imagem']['name'];


    if ($nome_original_imagem = $_FILES['imagem']['name']){

        $extensao = pathinfo($nome_original_imagem, PATHINFO_EXTENSION);


        if ($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png') {
            echo 'Formato de imagem Inválido';
            exit;
        }

        $hash = md5(uniqid($_FILES['imagem']['tmp_name'], true));

        $nome_final_imagem = $hash . '.' . $extensao;

        $pasta = '../img/upload/';

        move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $nome_final_imagem);

        $sql = "UPDATE tb_viagens SET `titulo` = '$titulo',
                                  `local` = '$local',
                                  `valor` = '$valor',
                                  `desc` = '$desc',
                                  `imagem` = '$nome_final_imagem'
                              WHERE 
                                  id = $id;
                              ";
    } else {

        $sql = "UPDATE tb_viagens SET `titulo` = '$titulo',
                                  `local` = '$local',
                                  `valor` = '$valor',
                                  `desc` = '$desc' 
                              WHERE 
                                  id = $id;
                              ";
    }

    $comando = $con->prepare($sql);

    $comando->execute();

    header('location: ../admin/alterar_viagens.php?id=' . $id);
} catch (PDOException $erro) {
    echo $erro->getMessage();
}
