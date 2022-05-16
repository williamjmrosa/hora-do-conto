<?php
Class  ConexaoBanco extends PDO{
    
    private static $instancia=null;
    
    public function __construct($dsn,$usuario,$senha){
        
        //Contrutor da Classe Pai PDO
        parent::__construct($dsn,$usuario,$senha);
    }
    
    public static function getInstancia() {
        if(!isset(self::$instancia)){
            try {
                /*Cria e retorna uma nova conexao*/
                
                self::$instancia = new ConexaoBanco("mysql:dbname=horadoconto;host=localhost", "root", "");
                
                
            } catch (Exception $e) {
                echo "Erro ao Conectar";
                exit();
                
            }//fecha catch
        }//fecha if
        return self::$instancia;
    }//fecha método
    
}//fecha classe

?>