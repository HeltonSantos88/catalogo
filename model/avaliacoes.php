<?php

require_once "./model/conexao.php";

class Avaliacoes extends Conexao {
    
   /**
     * Cria a conexão 
     * @author Helton
     * @link google.com
     * @return \PDO
     */
    private function conecta (){
       $con = new PDO('mysql:host=' . Conexao::HOST . ';dbname=' . Conexao::DATABASE, Conexao::USUARIO, Conexao::SENHA,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 

       return $con;
    } 
    
    /**
     * retorna as notas do filme ou zero caso nao exista
     * @param int $filme
     * @return array
     */
    public function getNota($filme){
        
        $con = $this-> conecta();
        
        $sql = "SELECT * FROM `avaliacoes`
                WHERE filmes_id = $filme";
        
        $retorno = $con->query($sql);
        
        $vetor = $retorno->fetchAll(PDO::FETCH_ASSOC);
        
        $media= 0;
        
        if(count($vetor) > 0) {
        
        foreach ($vetor as $nota) {
            
            $media += $nota["nota"];
            
        }
        
        $media = $media / count($vetor);
        
        }
        return $media;
    }
    
    public function setNota($filme, $nota) {
        
        $sql = "INSERT INTO avaliacoes"
                . " (filmes_id, nota) VALUES ('$filme', '$nota')";
        
    }
}
