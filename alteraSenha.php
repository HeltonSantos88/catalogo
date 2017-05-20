<pre>
<?php

echo sha1('abc1234');

session_start();

require_once './model/conexao.php';
require_once './model/usuario.php';

$usuario = new Usuario();

$erro_nova = false;
$erro_atual = FALSE;

if (count($_POST) > 0)
{
   if ($usuario->validaUsuario($_SESSION['usuario']['usuario'], $_POST['senha-atual']) == false) {
       $erro_msg = "A senha atual está incorreta";
       $erro_atual = true;
   }elseif ($_POST['confirme-senha'] != $_POST['nova-senha'] || strlen($_POST['nova-senha']) < 4) {
       $erro_msg = "As novas não são iguais";
       $erro_nova = true;
   }else {
       $usuario->alteraSenha($_POST['usuario']['usuario'], $_SESSION['usuario']['usuario']);
       header("Location: admin.php");
   }
}


?>
</pre>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Alterar a Senha</title>

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
                            <h3 class="panel-title">Alterar Senha</h3>
                        </div>
                        <div class="panel-body">
                            <form accept-charset="UTF-8" role="form" action="alteraSenha.php" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Usuário</label>
                                            <?php echo $_SESSION['usuario']['usuario'] ?>
                                    </div>
                                    <div class="form-group <?php echo ($erro_atual)? "has-error" :""; ?>">
                                        <input class="form-control" placeholder="Senha Atual" name="senha-atual" type="password" value="">
                                    </div>
                                    <div class="form-group <?php echo ($erro_nova = TRUE)? "has-error" :""; ?>">
                                        <input class="form-control" placeholder="Nova Senha" name="nova-senha" type="password" value="">
                                    </div>
                                    <div class="form-group <?php echo ($erro_nova = true)? "has-error" :""; ?>">
                                        <input class="form-control" placeholder="Confirme a Senha" name="confirme-senha" type="password" value="">
                                    </div>
                                    
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Alterar">
                                </fieldset>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>