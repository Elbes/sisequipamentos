<!DOCTYPE html>
<html>
    <head>

       <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php include 'constant.php';?>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="css/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/dist/sweetalert.css">
        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/bootstrap.min.js"></script>    
        
    </head>
    <body>

        <?php
        include_once '../Model/session.php';
        include_once '../control/validalogin2.php';	
        include_once 'menu.php';

        $boas = new Session();
        ?>

        <div class="container">

            <span class="breadcrumb">
                <?php $boas->boasVindas(); ?>
            </span>

            <div class="panel panel-primary">

                <div class="panel-heading panel-primary text-center">ACESSO RÁPIDO</div>

                <?php
                include_once 'menu_acesso_rapido.php';
                ?>      

                <?php $rodape = new Session(); $rodape->footer();?>         
            </div>     

        </div>
        
    </body>

</html>
