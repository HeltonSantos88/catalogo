<?php

    
    require_once './model/conexao.php';   
    require_once './model/filmes_pdo.php';
    
    $filmes_pdo = new Filmes();
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

    <title>Catalogo de Filmes</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <?php      include "./template/barra_topo.html"; ?>



    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php
        if (isset($filmes) == false)
        {
            $filmes = $filmes_pdo->listaFilmes();
        }   
            /*for ($i=0; $i < count($filmes); $i++)
            {
                $filme = $filmes[$i];
            }*/
            
            foreach ($filmes as $filme):
        ?>
        <div class="col-md-4">
          <h2><?php echo $filme["nome"] ?></h2>
          
          <img src="imagens/<?php echo $filme["imagem"] ?>" alt="" class="img-thumbnail"/>
          
          <p><?php echo $filme["descricao"] ?></p>
          <p><a class="btn btn-default" href="detalhes.php?id=<?php echo $filme["id"]; ?>" role="button">Ver detalhes &raquo;</a></p>
        </div>
        <?php        endforeach; ?>
          
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


   
  </body>
</html>
