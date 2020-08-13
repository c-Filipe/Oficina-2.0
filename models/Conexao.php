<?php 
 
class Conexao {

    private static $instace;

    public static function getConn(){
        
        if(!isset(self::$instace)){
           
            self::$instace = new \PDO("mysql:dbname=oficina;host=localhost",'root', '' );
          
            
            
        }
        return self::$instace;
    }

} 