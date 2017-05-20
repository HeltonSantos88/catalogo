<?php

session_start();

require_once './model/conexao.php';
require_once './model/usuario.php';

if (count($_POST) > 0)
{
    $usuario = new Usuario();

    $logado = $usuario->validaUsuario($_POST['usuario'], $_POST['senha']);
    
    if ($logado == FALSE)
    {
        $erro_msg = "Usuário e/ou senha incorretos!";
    } else {
        $_SESSION['usuario'] = $logado;
        header("Location: admin.php");
        
    }
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

        <style>
            .login {
                margin-top: 40%;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                
            <?php if(isset($erro_msg) == true): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erro_msg; ?>
                </div>
            <?php endif; ?>
                <div class="col-md-4 col-md-offset-4">
                    
                    <div class="panel panel-default login">
                        <div class="panel-heading">
                            <h3 class="panel-title">Entrar no Admin</h3>
                        </div>
                        <div class="panel-body">
                            <form accept-charset="UTF-8" role="form" action="login.php" method="POST">
                                <fieldset>
                                    <div class="form-group <?php echo (isset($erro_msg))? "has-error" :""; ?>">
                                        <input class="form-control" placeholder="Usuário" name="usuario" type="text">
                                    </div>
                                    <div class="form-group <?php echo (isset($erro_msg))? "has-error" :""; ?>">
                                        <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="manter" type="checkbox" value="Remember Me"> Mantenha Logado
                                        </label>
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Logar">
                                </fieldset>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>