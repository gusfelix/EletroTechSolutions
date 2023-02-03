<?php

class Conexao{
    
    protected static $conexao;

    private function __construct() {


        $db_host = "db4free.net";
        $db_name = "sqleletrotech";
        $db_user = "sqleletrotech";
        $db_password = "bk24xudNmQ";
        $db_driver = "mysql";

        try {
            self::$conexao = new PDO("$db_driver:host=$db_host; dbname=$db_name", $db_user, $db_password);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('SET NAMES utf8');

            // echo "Conectado com sucesso!";

        } catch (PDOException $error) {

            echo "Erro na conexão com Banco de Dados: " . $error->getMessage();
        }
    }

    public static function getConexao(){
        if(!self::$conexao){
            new Conexao();
        }

        return self::$conexao;
    }
}

?>