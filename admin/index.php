<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header('Location: gerenciar_viagens.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Tela de Login</title>
</head>

<body>

    <div id="container">

        <fieldset>

            <h3>Faça Seu Login</h3>

            <form action="../backend/_validar_login.php" method="post">

                <div class="campo">
                    <label for="usuario">Usuario</label>
                    <input type="email" name="usuario" placeholder="Digite seu usuario" required>
                </div>

                <div class="campo">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="btn">
                    <button type="submit" value="login">Login</button>
                </div>

            </form>

        </fieldset>

    </div>

</body>

</html>