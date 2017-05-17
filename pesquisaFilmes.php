<?php

require_once './model/filmes_pdo.php';

$pesquisa = $_POST['pesquisa'];

$filmes = pesquisaPorNome($pesquisa);

include './index.php';