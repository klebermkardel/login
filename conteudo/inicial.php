<?php
    include("classe/conexao.php");
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
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href="index.php?p=editar&usuario=">Editar</a>
            <a href="index.php?p=">Deletar</a>
        </td>
    </tr>
</table>