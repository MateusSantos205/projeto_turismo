<?php
include '../backend/controle_sessao.php';
include '../backend/conexao.php';
// captura a variavel global ID recebida via get
$id = $_GET['id'];

    try{
        // coamando sql que ira receber as viagens po ID
    $sql = "SELECT * FROM tb_viagens WHERE id = $id";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($dados);
    // echo "<pre>";

    

}catch(PDOException $erro){
        echo $erro->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Viagens</title>
</head>
<body>

    <div id="container">

    <h3>Alterar Viagens</h3>

    <form action="../backend/_alterar_viagens.php" method="post" enctype="multipart/form-data" >
        <div id="grid-alterar">

            <div>
                <label for="">ID</label>
                <input type="text" name="id" id="id" value="<?php echo $dados[0]['id']?>" readonly>
            </div>

            <div>
                <label for="">Título</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo']?>">
            </div>

            <div>
                <label for="">Local</label>
                <input type="text" name="local" id="local" value="<?php echo $dados[0]['local']?>">
            </div>

            <div>
                <label for="">Valor</label>
                <input type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor']?>">
            </div>

            <div>
                <label for="">Descrição</label>
                <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $dados[0]['desc']?></textarea>
            </div>

            <div>
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" id="imagem" value="">
            </div>

            <img src="../img/upload/<?php echo $dados[0]['imagem'];?>" alt="Imagem da viagem">

        </div>

        <input type="submit" value="Salvar">

    </form>

    </div>
    
</body>
</html>