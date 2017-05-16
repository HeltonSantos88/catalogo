<?php

require_once 'model/filmes.php';
$id = $_GET["id"];

$filme = obtemFilme($id);



include 'cadastro.php';

