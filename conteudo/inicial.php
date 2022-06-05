<?php

    include("classe/conexao.php");

    $sql_code = "SELECT * FROM usuarios";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $linha = $sql_query->fetch_assoc();

?>

<h1>Usuários</h1>
<a href="index.php?p=cadastrar">Cadastrar novo usuário</a>
<p class="espaco"></p>
<table border=1 cellpadding=10>
    <tr class="titulo">
        <td>Nome</td>
        <td>Sobrenome</td>
        <td>Sexo</td>
        <td>E-mail</td>
        <td>Nível de Acesso</td>
        <td>Data de Cadastro</td>
        <td>Ação</td>
    </tr>
    <?php
    do{
    ?>
    <tr>
        <td><?php echo $linha['nome']; ?></td>
        <td><?php echo $linha['sobrenome']; ?></td>
        <td><?php echo $linha['sexo']; ?></td>
        <td><?php echo $linha['email']; ?></td>
        <td><?php echo $linha['niveldeacesso']; ?></td>
        <td><?php echo $linha['dtCadastro']; ?></td>
        <td>
            <a href="index.php?p=editar&usuario=<?php echo $linha['codigo']; ?>">Editar</a>
            <a href="index.php?p=deletar&usuario=<?php echo $linha['codigo']; ?>">Deletar</a>
        </td>
    </tr>
    <?php } while($linha = $sql_query->fetch_assoc()); ?>
</table>