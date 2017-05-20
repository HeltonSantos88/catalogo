
<?php
require_once '../model/conexao.php';
require_once '../model/avaliacoes.php';

$avaliacao = new Avaliacoes();

$resultado = $avaliacao->setNota($_GET['id'], $_GET['nota']);

header("Location: /detalhes.php?id=".$_GET['id']);

