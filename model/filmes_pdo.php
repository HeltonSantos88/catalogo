<?php

define('USUARIO', "root"); // constante
define('SENHA', "elaborata");
define('HOST', "127.0.0.1");
define('DATABASE', "catalogo");

$con = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USUARIO, SENHA,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

$retorno = $con->query("SELECT * FROM filmes");

$vetor = $retorno->fetchAll(PDO::FETCH_OBJ);

var_dump($vetor);
