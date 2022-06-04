<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['id'])) {
        die("Você não tem permissão para acessar está página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
    } //Apresenta mensagem caso tentem logar em um usuário válido e mostra opção para ir para página de login

?>