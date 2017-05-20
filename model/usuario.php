<?php

class Usuario
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
    
    public function validaUsuario($usuario, $senha)
    {   
        $salt = "abc";
        $senha_cod = sha1($salt.$senha);
        $sql = "SELECT * FROM usuarios "
                . "WHERE usuario = '$usuario' "
                . "AND senha = '$senha_cod' "
                . "AND ativo = 1";
        
        $con = $this->conecta();
        
        $resultado = $con->query($sql);
        
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
    
    
    /**
     * altera a senha do usuario
     * @param string $senha
     * @param string $usuario
     * @return boolean
     */
    public function alteraSenha($senha, $usuario) {
        $salt = "abc";
        $senha_cod = sha1($salt.$senha);
        $sql = "UPDATE usuarios "
                . "SET senha = '$senha_cod' "
                . "WHERE usuario = '$usuario'";
        
        $con = $this->conecta();
        $con->exec($sql);
        
    }
}

