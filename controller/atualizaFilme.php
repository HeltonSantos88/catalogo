<pre>
<?php

 require_once '../model/filmes.php';

 print_r($_POST);
 print_r($_FILES);
 
 if ($_FILES['capa']['name'] != "")
 {
    $arq_tmp = $_FILES['capa']['tmp_name'];
    $vetor = explode('.', $_FILES['capa']['name']);
    $extensao = array_pop($vetor);
    
    $imagem = uploadCapa($arq_tmp, $extensao);
     
 } else {
    $imagem = "";
 }
 
$res = atualizaFilme($_POST["id"], 
        $_POST["titulo"], 
        $imagem, 
        $_POST["descricao"], 
        $_POST["diretor"], 
        $_POST["atores"]);


if ($res !== true)
{
    echo "Ocorreu um problema ao alterar o filme.";
} else {
    header("Location: ../admin.php");
}