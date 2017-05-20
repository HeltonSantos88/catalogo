<?php

require_once '../model/filmes.php';
    
    
if (count($_POST) > 0)
{
    $arq_tmp = $_FILES['capa']['tmp_name'];
    $vetor = explode('.', $_FILES['capa']['name']);
    $extensao = array_pop($vetor);

    $imagem = uploadCapa($arq_tmp, $extensao);

    $res = cadastraFilme($_POST['titulo'], $imagem, $_POST["descricao"], $_POST["diretor"], $_POST["atores"]);

    if ($res !== true)
    {
        echo "Ocorreu um problema ao cadastrar o filme.";
    } else {
        header("Location: ../admin.php");
    }
}
