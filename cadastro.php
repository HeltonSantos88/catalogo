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

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Meu NetFlix</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="admin.php">Admin</a></li>
                        <li class="active"><a href="cadastro.php">Cadastrar Novo</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            <h1>Novo filme</h1>
            
            <?php
                //if ternário
                $action = (isset($filme) == true)? "controller/atualizaFilme.php": "controller/cadastraFilme.php";
            ?>
            <form class="form-horizontal" action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <?php if (isset($filme['id']) == true): ?>
                    <input type="hidden" name="id" value="<?php echo $filme["id"] ?>"/>
                    <?php endif; ?>
                    <!-- Form Name -->
                    <legend>Cadastro de filme</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titulo">Título do filme</label>  
                        <div class="col-md-4">
                            <input id="título" name="titulo" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo (isset($filme['nome']) == true) ? $filme['nome'] : ""; ?>">

                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="descricao">Descrição</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" id="descricao" name="descricao" ><?php echo (isset($filme['descricao']) == true) ? $filme['descricao'] : ""; ?></textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="diretor">Diretor</label>  
                        <div class="col-md-4">
                            <input id="diretor" name="diretor" type="text" placeholder="" class="form-control input-md" value="<?php echo (isset($filme['diretor']) == true) ? $filme['diretor'] : ""; ?>">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="atores">Atores</label>  
                        <div class="col-md-4">
                            <input id="atores" name="atores" type="text" placeholder="" class="form-control input-md" value="<?php echo (isset($filme['atores']) == true) ? $filme['atores'] : ""; ?>">

                        </div>
                    </div>

                    <!-- File Button --> 
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="capa">Imagem de capa</label>
                        <div class="col-md-4">
                            <?php if (isset($filme["imagem"]) == true): ?>
                            <img src="imagens/<?php echo $filme["imagem"] ?>" width="80" height="120"/>
                            <?php endif; ?>
                            <input id="capa" name="capa" class="input-file" type="file">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="salvar"></label>
                        <div class="col-md-4">
                            <button id="salvar" name="salvar" class="btn btn-success">Salvar</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div><!-- /.container -->

    </body>
</html>
