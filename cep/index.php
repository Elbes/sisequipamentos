<!DOCTYPE html>
<html>
    <head>
        <title>Busca CEP - krebscode.eti.br</title>
        <script src="jquery-1.11.3.min.js"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <script src="jquery.inputmask.js"></script>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
    </head>
    <body>
    <!--<fieldset>-->
            <form action="" method="get">
            
            <!--<input type="text" name="cep" id="">-->
            <legend>Informe o CEP</legend>
            <input type="text" name="cep" id="">
            <!--<button type="button" onclick="buscaCep()">Consultar CEP</button>-->
            
            <input type="submit" value="Buscar CEP" />
            
            </form> 
        <!--</fieldset>-->

        <?php
        
        if(isset($_GET['cep'])){
            
            $cep = filter_input(INPUT_GET, 'cep');
            
            if(empty($cep)){
                echo 'informe o CEP';
            }else{
                              
                //Passa o CEP a ser pesquisado
//$cep = "02513000";
 
//Verifica a válidade do valor informado
if (is_numeric($cep) && strlen($cep) == 8) {
    $xml = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?cep={$cep}&formato=xml");
    if ($xml->resultado > 0) {
        echo "Estado: <strong>" . $xml->uf . "</strong> \n";
        echo "Cidade: <strong>" . $xml->cidade . "</strong> \n";
        echo "Bairro: <strong>" . $xml->bairro . "</strong> \n";
        echo "Rua: <strong>" . $xml->logradouro . "</strong> \n";
    } else {
        echo "O CEP <strong>{$cep}</strong> não foi encontrado!";
    }
} else {
    echo "O CEP <strong>{$cep}</strong> é inválido!";
}

            }
            
                }
                
        ?>
        
        
        
<!--
        <fieldset>
            <legend>Dados do CEP</legend>
            
            <input type="text" id="nomeRua" placeholder="Nome da rua">
            <input type="text" id="nomeBairro" placeholder="Bairro">
            <input type="text" id="uf" placeholder="UF" maxlength="2">
            <input type="text" id="nomeCidade" placeholder="Cidade">
        </fieldset>-->





















      <?php
//               $postCorreios = "CEP=" . $cep . "&Metodo=listaLogradouro&TipoConsulta=cep";
//                
//                $cURL = curl_init("http://www.buscacep.correios.com.br/servicos/dnec/consultaLogradouroAction.do");
//
//
//                curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
//                curl_setopt($cURL, CURLOPT_HEADER, false);
//                curl_setopt($cURL, CURLOPT_POST, true);
//                curl_setopt($cURL, CURLOPT_POSTFIELDS, $postCorreios);
//
//                $saida = curl_exec($cURL);
//
//
//                curl_close($cURL);
//
//                $saida = utf8_encode($saida);
//
//                $tabela = preg_match_all('@<td (.*?)<\/td>@i', $saida, $campoTabela);
//                
//                
////                $campoTabela = "";
////                preg_match_all('@<td (.*?)<\/td>@i', $saida2, $campoTabela);
//
//
//                echo '<pre>';
//                
//                print_r($campoTabela);
//                echo '</pre>';
//                
//                
//                
//            }
//            
    
      
        ?>










    </body>
</html>