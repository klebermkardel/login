<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Usuários</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
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
    <input name="senha" value="" required type="password">
    <p class="espaco"></p>

    <label for="rsenha">Repita a Senha</label>
    <input name="rsenha" value="" required type="password">
    <p class="espaco"></p>

    <input value="Salvar" name="confirmar" type="submit">

    </form>
</body>
</html>