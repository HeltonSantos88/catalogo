<?php

define('USUARIO', "root"); // constante
define('SENHA', "elaborata");
define('HOST', "127.0.0.1");
define('DATABASE', "catalogo");

/**
 * Cria a conexão 
 * @author Helton
 * @link google.com
 * @return \PDO
 */
function conecta (){
   $con = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USUARIO, SENHA,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 

   return $con;
}

/**
 * Lista todos os filmes em catalogo
 * @return array 
 */
function listaFilmes() {
    
    $con = conecta();

    $retorno = $con->query("SELECT * FROM filmes");

    $vetor = $retorno->fetchAll(PDO::FETCH_ASSOC);
    
    return $vetor;
}
