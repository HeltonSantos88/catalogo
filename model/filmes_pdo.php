<?php


class Filmes
{
    /**
     * Cria a conexão 
     * @author Edir
     * @link google.com 
     * @return \PDO
     */
    private function conecta()
    {
        $con = new PDO('mysql:host='.  Conexao::HOST.';dbname='.Conexao::DATABASE, Conexao::USUARIO, Conexao::SENHA, 
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

        return $con;
    }

    /**
     * Lista todos os Filmes em catálogo
     * @return array
     */
    public function listaFilmes()
    {

        $con = $this->conecta();

        $retorno = $con->query("SELECT * FROM filmes");

        return $retorno->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna o filme solicitado
     * @param int $id
     * @return array
     */
    public function getFilme($id)
    {
        $con = $this->conecta();

        $sql = "SELECT *
            FROM filmes
            WHERE id = $id";

        $retorno = $con->query($sql);

        return $retorno->fetch(PDO::FETCH_ASSOC);

    }

    public function pesquisaPorNome($nome)
    {
        $sql = "SELECT * FROM filmes 
                WHERE nome LIKE '%$nome%'";

        $con = $this->conecta();

        $retorno = $con->query($sql);

        return $retorno->fetchAll(PDO::FETCH_ASSOC);
    }


}