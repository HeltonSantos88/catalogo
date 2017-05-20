<?php

class Avaliacoes
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
     * Retorna a média das notas do filme ou zero caso não exiata
     * @param int $filme
     * @return array
     */
    public function getNota($filme)
    {
        $con = $this->conecta();
        
        
        $sql = "SELECT * FROM avaliacoes WHERE filmes_id = $filme";
        
        $retorno = $con->query($sql);
        
        $vetor = $retorno->fetchAll(PDO::FETCH_ASSOC);
        
        $media = 0;
        
        if (count($vetor) > 0)
        {
            foreach ($vetor as $nota)
            {
                $media +=  $nota["nota"];
            }

            $media = $media / count($vetor);
        }
        
        return $media;
    }
    
    /**
     * Adiciona uma nota ao filme
     * @param int $filme
     * @param int $nota
     */
    public function setNota($filme, $nota)
    {
        $sql = "INSERT INTO avaliacoes "
                . "(filmes_id, nota) "
                . "VALUES ('$filme', '$nota')";
        
        $con = $this->conecta();
        return $con->exec($sql);
        
        
    }
}
