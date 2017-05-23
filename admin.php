<?php
    
    
    session_set_cookie_params(300);
    session_start();
    
    
   require_once './model/filmes.php';

    if (isset($_SESSION['usuario']))
    {
        $msg = (isset($_GET["msg"]) == true)? $_GET["msg"] : FALSE;
    } else {
        header("Location: login.php");
    }   

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


    <title>Cadastro de Filmes</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    
  </head>
  
  <body>

    <?php      include './template/topo_admin.php';  ?>

    <div class="container">

        <div class="row">
            
         <?php if ($msg != FALSE): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $msg ?>
            </div>
         <?php endif; ?>
            
            <h1>Listagem de Filmes cadastrados</h1>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Filme</th>
                        <th>imagem</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php 
                    
                //for($i = 0; $i < count($dados); $i++):
                    
                $dados = obtemTodosFilmes();
                
                foreach ($dados as $filme):
                        
                ?>
                    <tr>
                        <td><a href="filme.php?id=<?= $filme["id"] ?>"><?= $filme["id"] ?></a></td>
                        <td><?php echo $filme["nome"] ?></td>
                        <td><img src="imagens/<?php echo $filme["imagem"] ?>" width="80" height="120"/> </td>
                        <td><?php echo $filme["categoria"] ?></td>
                        <td>
                            <a href="atualizar.php?id=<?= $filme["id"] ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="controller/deletaFilme.php?id=<?= $filme["id"] ?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </td>
                    </tr>
                    
                  <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>

    </div><!-- /.container -->


   
  </body>
</html>
