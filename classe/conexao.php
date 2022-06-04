<?php

    $usuario = 'root';
    $senha = '';
    $bd = 'login';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $bd);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }

?>