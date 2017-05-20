<?php
session_start();

if (isset($_SESSION['usuario']))
{

} else {
    header("Location: login.php");
}   

require_once 'model/filmes.php';

$id = $_GET["id"];

$filme = obtemFilme($id);


include 'template/cadastro.php';


