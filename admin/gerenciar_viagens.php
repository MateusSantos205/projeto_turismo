<?php

    include '../backend/conexao.php';

    try{
        $sql = "SELECT * FROM tb_viagens";

        $comando = $con->prepare($sql);

        $comando->execute();

        $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

        // echo "<pre>";
        // var_dump($dados);
        // echo "</pre>";

    }catch(PDOException $erro){
        echo $erro->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gerenciar Viagens</title>
</head>
<body>

    <div id="container">
        <h3>Gerenciar Viagens</h3>

        <div id="tabela">

            <table border="1">
            
                <!-- tr=linha td=coluna th=titulo -->
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Local</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>

                <!--  -->
                <?php
                    foreach($dados as $viagem):
                ?>
                <!--  -->

                <tr>
                    <td><?php echo $viagem['id']; ?></td>
                    <td><?php echo $viagem['titulo']; ?></td>
                    <td><?php echo $viagem['local']; ?></td>
                    <td>R$<?php echo $viagem['valor']; ?></td>
                    <td><?php echo $viagem['desc']; ?></td>
                    <td>

                        <a href="alterar_viagens.php?id=<?php echo $viagem['id']; ?>">Alterar</a>
                    </td>

                    <td>
                        <a href="../backend/_deletar_viagens.php?id=<?php echo $viagem['id']; ?>">Deletar</a>
                    </td>
                </tr>

                <?php
                    endforeach;
                ?>

            </table>

        </div>

    </div>
    <!--  fechar conexão -->
    <?php
    $conn = null;
    ?>
    <!--  -->
</body>
</html>