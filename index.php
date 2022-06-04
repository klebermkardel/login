<?php
    include('conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Preencha o e-mail"; //Verifica se o e-mail foi preenchido e mostra erro caso não tenha sido
        } else if (strlen($_POST['senha']) == 0) {
            echo "Preencha a senha corretamente"; //Verifica se a senha foi preenchida e mostra erro caso não tenha sido
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; // verifica se usuário e senha preenchidos estão no banco de dados
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL" . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();
                
                if(!isset($_SESSION)) {
                    session_start(); // inicia a sessão estando tudo ok
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: painel.php"); //Direciona para página logada


            } else {
                echo "Falha ao logar! E-mail ou senha senha incorretos"; //Caso usuário ou senha não sejam localizados no banco sistema mostra mensagem de erro informando
            }

        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">       
        <p>
            <label for="">E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="">Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>