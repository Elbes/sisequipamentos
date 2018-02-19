<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class Controller {

    private $action;

    public function __construct($action = null) 
    {
        if ($action !== null) {
            $this->action['action'] = $action;
        }
    }

    public function ajax_busca_cep($parametros)
    {
        if(key_exists('cep',$parametros))
        {
            if(!empty($parametros['cep']))
            {
                $cep = $parametros['cep'];
                
                // parametros da url
                $postCorreios = "CEP=" . (string) $cep . "&Metodo=listaLogradouro&TipoConsulta=cep";
                
                $cURL = curl_init("http://www.buscacep.correios.com.br/servicos/dnec/consultaLogradouroAction.do");

                curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($cURL, CURLOPT_HEADER, false);
                curl_setopt($cURL, CURLOPT_POST, true);
                curl_setopt($cURL, CURLOPT_POSTFIELDS, $postCorreios);

                $saida1 = curl_exec($cURL);

                curl_close($cURL);

                $saida2 = utf8_encode($saida1);

                $campoTabela = "";
                preg_match_all('@<td (.*?)<\/td>@i', $saida2, $campoTabela);


                echo '<pre>';
                
                print_r($campoTabela);
                echo '</pre>';
                
                
            }
        }
    }
}
                
                
//                if(is_array($campoTabela[0]) && count($campoTabela[0]) > 0) 
//                {
//                    $jsonString['opcoes'] = "";
//
//                    $jsonString['opcoes'][0]['rua'] = strip_tags($campoTabela[0][0]); // rua
//                    $jsonString['opcoes'][0]['bairro'] = strip_tags($campoTabela[0][1]); // bairro
//                    $jsonString['opcoes'][0]['cidade'] = strip_tags($campoTabela[0][2]); // cidade
//                    $jsonString['opcoes'][0]['estado'] = strip_tags($campoTabela[0][3]); // estado
//                    $jsonString['opcoes'][0]['cep'] = strip_tags($campoTabela[0][4]); // cep
//                    return json_encode($jsonString); // retorna dados no formato json 
//               }
//            }
//        }
//        
//        return false;
//    }
//    
//    
//    public function execute($parametros)
//    {
//        return call_user_func_array([$this, $this->action['action']], [$parametros]);
//        
////        return false;
//    }
//
//}
//
//
//$controller = new Controller('ajax_busca_cep');
//
//echo $controller->execute($_REQUEST);
//
