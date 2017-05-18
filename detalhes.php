<?php
    require_once './model/conexao.php';
    require_once './model/filmes_pdo.php';
    require_once './model/avaliacoes.php';
    
    $filmes_pdo = new Filmes();
    $avaliacao = new Avaliacoes();
    
    $id = $_GET["id"];
    $filme = $filmes_pdo-> getFilme($id);
    
    $nota = $avaliacao-> getNota($id);
    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Catalogo de filmes</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>

        <?php include "template/barra_topo.html"; ?>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">

                <h1><?php echo $filme['nome'] ?></h1>
                <img src="imagens/<?php echo $filme['imagem'] ?>" alt="MadMax" class="img-thumbnail"/>
                <p>Descrição do filme: <?php echo $filme['descricao'] ?></p>
                <p>Categoria: <?php echo $filme['categoria'] ?></p>
                <p>Diretor: <?php echo $filme['diretor'] ?></p>
                <p>Atores: <?php echo $filme['atores'] ?></p>
                <div class="col-sm-3">
                    <div class="rating-block">
                        <h4>Avaliação:</h4>
                        <h2 class="bold padding-bottom-7"><?php echo $nota ?><small>/ 5</small></h2>
                        <?php for($i = 0; $i < 5; $i++): ?>
                        <?php if($nota > $i): ?>
                        <a href="controller/votar.php?id=<?php echo $id; ?>&nota=<?php echo $i+1; ?>" class="btn btn-warning btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </a>
                        <?php else: ?>
                        <a href="controller/votar.php?id=<?php echo $id; ?>&nota=<?php echo $i+1; ?>" class="btn btn-default btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </a>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <hr>

            <footer>
                <p>&copy; 2016 Company, Inc.</p>
            </footer>
        </div> <!-- /container -->

    </body>
</html>