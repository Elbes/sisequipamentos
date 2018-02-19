<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author Elbes Alves
 */
class Conexao {
    
    
    static public function conectar(){
        
               
        $obj = new PDO('mysql:localhost;port=3306;dbname=sdi', 'root', '091190');
        
       return $obj; 
         
         
    }
     
}

?>
