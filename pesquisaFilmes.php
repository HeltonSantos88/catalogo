<?php

require_once './model/filmes_pdo.php';

$filmes_pdo = new Filmes();

$pesquisa = $_POST['pesquisa'];

$filmes = $filmes_pdo->pesquisaPorNome($pesquisa);

include './index.php';