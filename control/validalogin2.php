<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Valida Login Paginas</title>
     
        
    </head>
    <body>
       
        <div class="container">
            
            <?php
            
            if (isset ($_SESSION["nome_usuario"])) {

            }else{
           
                
            ?>  
                <script> validalogin();</script>;    
            <?php }
            
        
//            <!--echo "<script> alert ('Voce nao esta logado!') </script>";-->
//            <!--echo "<script> location.href = ('../index.php') </script>";-->

            ?>

        </div>   
            
    </body>
</html>
