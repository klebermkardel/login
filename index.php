<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/styles.css">
    <title>Controle de Usuários</title>
</head>
<body>
  <div class=principal>
    <?php 

    if(isset($_GET['p'])){

      $pagina = $_GET['p'].".php";
      if(is_file("conteudo/$pagina"))
        include("conteudo/$pagina");
      else
        include("conteudo/404.php");

    }else
      include("conteudo/inicial.php");

    ?>
  </div>
</body>
</html>