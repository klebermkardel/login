<?php

    include("classe/conexao.php");

    if(isset($_POST['confirmar'])) { //Verifica se usuário clicou no botão salvar para cadastrar um novo usuário

        // 1- Registro dos dados
        if(!isset($_SESSION)) 
            session_start();

        foreach($_POST as $chave=>$valor)
            $_SESSION[$chave] = 
            $mysqli->real_escape_string($valor); //Mantém os dados preenchidos caso saia da página ou ocorra algo de diferente

        // 2- Validação dos dados

          // strlen verifica tamanho da string informada (se estiver vazia (nula), apresenta menssagem de erro)
        if(strlen($_SESSION['nome']) == 0)
            $erro[] = "Preencha o nome do usuário.";

        if(strlen($_SESSION['sobrenome']) == 0)
            $erro[] = "Preencha o sobrenome do usuário";

        if(substr_count($_SESSION['email'], '@') != 1 || substr_count($_SESSION['email'], '.') < 1 || substr_count($_SESSION['email'], '.') > 2) // Valida e-mail verificando se possui mais de um '@' e menos de um ou mais de 2 '.'
            $erro[] = "Preencha o e-mail corretamente";

        if(strlen($_SESSION['niveldeacesso']) == 0)
            $erro[] = "Informe o Nível de Acesso do usuário";

        if(strlen($_SESSION['senha']) < 8 || strlen($_SESSION['senha']) > 16)
            $erro[] = "Preencha a senha corretamente";

        if(strcmp($_SESSION['senha'], $_SESSION['resenha']) != 0) //Verifica se senha e repita a senha estão iguais
            $erro[] = "As senhas não conferem";

        // 3- Inserção dos dados no banco e redireciona para tela de visualização de Usuários
        if(count($erro) == 0){

            $sql_code = "INSERT INTO usuarios (
                nome, 
                sobrenone, 
                email, 
                senha, 
                sexo, 
                niveldeacesso, 
                dtCadastro)
                VALUES(
                '$_SESSION[nome]',
                '$_SESSION[sobrenome]',
                '$_SESSION[email]',
                '$_SESSION[senha]',
                '$_SESSION[sexo]',
                '$_SESSION[niveldeacesso]',
                '$_SESSION[dtCadastro]'
                )";

            $confirma = $mysqli->query($sql_code) or die($mysqli->error);

            if($confirma){
                unset($_SESSION['nome'],
                $_SESSION['sobrenome'],
                $_SESSION['email'],
                $_SESSION['senha'],
                $_SESSION['sexo'],
                $_SESSION['niveldeacesso'],
                $_SESSION['dtCadastro']);

                echo "<script> location.href='index.php?p=inicial';</script>";

            }else
                $erro[] = $confirma;
                    
        }

    }

?>

<h1>Cadastrar Usuário</h1>
<?php
 if(count($erro) > 0){ //Mostra o erro que ocorreu
     echo "<div class='erro'>"; 
     foreach($erro as $valor) 
        echo "$valor <br>"; 
    
    echo "</div>";
}
?>
<a href="index.php?p=inicial">< Voltar</a>
<form action="index.php?p=cadastrar" method="POST">

    <label for="nome">Nome</label>
    <input name="nome" value="" required type="text">
    <p class="espaco"></p>

    <label for="sobrenome">Sobrenome</label>
    <input name="sobrenome" value="" required type="text">
    <p class="espaco"></p>

    <label for="email">E-mail</label>
    <input name="email" value="" required type="email">
    <p class="espaco"></p>

    <label for="sexo">Sexo</label>
    <select name="sexo">
        <option value="">Selecione</option>
        <option value="1">Masculino</option>
        <option value="2">Feminino</option>
    </select>
    <p class="espaco"></p>

    <label for="niveldeacesso">Nível de Acesso</label>
    <select name="niveldeacesso">
        <option value="">Selecione</option>
        <option value="1">Básico</option>
        <option value="2">Admin</option>
    </select>
    <p class="espaco"></p>

    <label for="senha">Senha</label>
    A senha deve conter entre 8 e 16 caracteres.
    <input name="senha" value="" required type="password">
    <p class="espaco"></p>

    <label for="rsenha">Repita a Senha</label>
    <input name="rsenha" value="" required type="password">
    <p class="espaco"></p>

    <input value="Salvar" name="confirmar" type="submit">

</form>
