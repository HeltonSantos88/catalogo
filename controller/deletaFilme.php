<?php

require_once '../model/filmes.php';

$id = $_GET["id"];

$resultado = removerFilme($id);

if ($resultado === true)
{
    $msg_retorno = "O filme foi removido com sucesso";
} else {
    $msg_retorno = "Não foi possivel remover o filme";
}

header("Location: ../admin.php?msg=$msg_retorno");