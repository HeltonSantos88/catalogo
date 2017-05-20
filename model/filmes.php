<?php

// 1 - conecto
// 2 - envio SQL
// 3 - Manipular retorno

function conecta()
{
    $usuario = "root";
    $senha = "elaborata";
    $host = "127.0.0.1";
    $database = "catalogo";

    $con = mysqli_connect($host, $usuario, $senha, $database);
    mysqli_set_charset($con, "utf8");
    
    return $con;
    
}

function obtemTodosFilmes()
{

    $con = conecta();

    $sql = "SELECT * FROM filmes";

    $retorno = mysqli_query($con, $sql);

    $dados = mysqli_fetch_all($retorno, MYSQLI_ASSOC);

    return $dados;
}

function obtemFilme($id)
{
    $con = conecta();

    $sql = "SELECT *
        FROM filmes
        WHERE id = $id";

    $retorno = mysqli_query($con, $sql);

    $dados = mysqli_fetch_array($retorno, MYSQLI_ASSOC);

    return $dados;
    
}

function cadastraFilme($titulo, $imagem, $descricao, $diretor, $ator)
{


    $sql = "INSERT INTO filmes (nome, imagem, descricao, categoria, diretor, atores, avaliacao)
            VALUES ('"
            . $titulo 
            ."', '$imagem', '"
            .$descricao."', 'sem-catageoria', '"
            .$diretor."', '"
            .$ator."', 1)";

    $con = conecta();

    $res = mysqli_query($con, $sql);

    return $res;

}


function uploadCapa($arquivo_orig, $extensao)
{
    
    //$nome_arquivo = $_FILES["capa"]["name"];    
    $nome_arquivo = uniqid().".$extensao";
    
    $pasta = __DIR__. "/../imagens/";        
    move_uploaded_file($arquivo_orig, $pasta.$nome_arquivo);
    
    return $nome_arquivo;
}

function removerFilme($id)
{
    $con = conecta();
    $sql = "DELETE FROM filmes WHERE id = $id";
    
    return mysqli_query($con, $sql);
    
}


function atualizaFilme($id, $titulo, $imagem, $descricao, $diretor, $ator)
{
    $con = conecta();
    
    if ($imagem != "")
    {
        $set_imagem = ", imagem = '$imagem' ";
    } else {
        $set_imagem = "";
    }
    
    $sql = "UPDATE filmes
            SET nome = '$titulo', 
                descricao = '$descricao', 
                diretor = '$diretor', 
                atores = '$ator' 
                $set_imagem 
            WHERE id = $id";
    
    return mysqli_query($con, $sql);
}