<?php
    include('protect.php'); //Segurança para caso alguém tente acessar sem um usuário válido
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Logada - Painel</title>
</head>
<body>
    Bem vindo ao Painel, <?php echo $_SESSION['nome']; ?>

    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>