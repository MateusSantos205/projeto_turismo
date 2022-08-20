<?php

// 
include 'backend/conexao.php';
// 

try{
    // monta a query sql
    $sql = "SELECT * FROM tb_viagens";
    // prepara a execução da query acima
    $comando = $con->prepare($sql);
    // executa o comando com a query no banco de dados
    $comando->execute();
    // criando a variavel que ira armazenar os dados, e setando o fatch de modo associativo(chave/valor)
    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($dados);
    // echo "</pre>";
    


}catch(PDOException $error){
    echo $error->getMessage();
}

?>

<!-- /////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Viagens</title>
</head>
<body>
    
    <div id="container">

        <h3 class="h3-viagens" >Lista de Viagens</h3>

        <div id="grid-viagens">
            <!--  -->
            <?php
                foreach($dados as $d):
            ?>
            <!--  -->
            <figure class="figure-viagens" >

                <img class="img-viagens" src="img/upload/<?php echo $d['imagem']?>" alt="Destaque viagem">

                <figcaption class="figcaption-viagens" >
                    <!-- Pacote de Inverno -->
                    <h4><?php echo $d ['titulo'];?></h4>
                    <h5><?php echo $d ['local'];?></h5>
                    <h5>R$<?php echo $d ['valor'];?></h5>
                    <SMAll><?php echo $d ['desc'];?></SMAll>

                    <button class="btn-comprar">Comprar</button>

                </figcaption>

            </figure>
            <!--  -->
            <?php
            endforeach;
            ?>
            <!--  -->
        </div>

    </div>

</body>
</html>

