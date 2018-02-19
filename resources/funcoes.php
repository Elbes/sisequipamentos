
<?php

	function regEstab($id_regiao){
		$dao = new RegiaoDAO();
		foreach ($dao->pesquisar($id_regiao) as $regiao){
			return $nome_regiao = $regiao['nome_regiao'];
		}
	}
	
	function tipoEstab($id_tipo_estabelecimento){
		$dao = new TipoEstabDAO();
		foreach ($dao->pesquisar($id_tipo_estabelecimento) as $estab){
			return $tipo = $estab['tipo'];
		}
	}
	
   //formata a data para o banco de dados
	function dataFormParaBanco($data){
		$aux = explode('/',$data);
	    return  $aux[2]."-".$aux[1]."-".$aux[0];
	}
   //formata a data para retornar para o formulário
	function dataBancoParaForm($data){
		$aux = explode("-",$data);
		return $aux[2]."/".$aux[1]."/".$aux[0];
	}
	
	function RemoveAcentos($str) {

		$str=utf8_decode($str);
		
		$clear_array = array( "á" => "a" , "é" => "e" , "í" => "i" , "ó" => "o" , "ú" => "u" ,
		"à" => "a" , "è" => "e" , "ì" => "i" , "ò" => "o" , "ù" => "ù" ,
		"ã" => "a" , "õ" => "o" , "â" => "a" , "ê" => "e" , "î" => "i" , "ô" => "o" , "û" => "u" ,
		"," => ""  , "!" => "" , "#" => "" , "%" => "", "¬" => "" , "{" => "" , "}" => "" ,
		"^" => ""  , "´" => "" , "`" => "" , "" => "" , "/" => "" , ";" => "" , ":" => "" , "?" => "" ,
		"¹" => "1" , "²" => "2" , "³" => "3" , "ª" => "a" , "º" => "o" , "ç" => "c" , "ü" => "u" ,
		"ä" => "a" ,"ï" => "i" , "ö" => "o" , "ë" => "e" , "$" => "s" , "ÿ" => "y" , "w" => "w" , "<" => "" ,
		">" => "" ,"[" => "" , "]" => "" , "&" => "e" , " " => "+"  );

		foreach($clear_array as $key=>$val){
		$str = str_replace($key, $val, $str);
		}
		return $str;
	}
	
	function remover($str, $enc = "UTF-8"){
		$acentos = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Etilde;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&etilde;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Itilde;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&itilde;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/'
		);
		
		return preg_replace($acentos, array_keys($acentos), htmlentities($str, ENT_NOQUOTES, $enc));
	}
	
		function diasemana($data) {  // Traz o dia da semana para qualquer data informada
			
		$dia =  substr($data,0,2);
		$mes =  substr($data,3,2);
		$ano =  substr($data,6,9);
		$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
		switch($diasemana){  
		                                case"0": $diasemana = "Domingo";
		                                break;  
		                                case"1": $diasemana = "Segunda-Feira";
		                                break;  
		                                case"2": $diasemana = "Terça-Feira";
		                                break;  
		                                case"3": $diasemana = "Quarta-Feira";
		                                break;  
		                                case"4": $diasemana = "Quinta-Feira";
		                                break;  
		                                case"5": $diasemana = "Sexta-Feira";
		                                break;  
		                                case"6": $diasemana = "Sábado";
		                                break;  
		                         }
	}
	
		// A $DATA2 DEVERÁ SER MAIOR QUE A $DATA1
		// O FORMATO DAS DATAS DEVEM SER DD/MM/AAAA
	function mesesDeDiferenca($data1, $data2) {
	
		if($data1 && $data2) {
		
			$vetorData1 = explode("/", $data1);
			$vetorData2 = explode("/", $data2);
			
			$resultado = ($vetorData2[2] - $vetorData1[2])*12;
			if ($vetorData1[1] > $vetorData2[1]) {
				$resultado -= ($vetorData1[1] - $vetorData2[1]);
			}
			else if ($vetorData2[1] > $vetorData1[1]) {
				$resultado += ($vetorData2[1] - $vetorData1[1]);
			}
		}
		else {
			$resultado = 0;
		}
		
		return $resultado;
	}

	

	function verificaNavegador(){
		  $useragent = $_SERVER['HTTP_USER_AGENT'];
 
		  if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    return 'IE';
		  } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    return 'Opera';
		  } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    return  'Firefox';
		  } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    return  'Chrome';
		  } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
		    $browser_version=$matched[1];
		    return 'Safari';
		  } else {
		    // browser not recognized!
		    $browser_version = 0;
		    return 'outro';
		  }
		 
	}
	

function fbarcode($valor){

$fino = 1 ;
$largo = 3 ;
$altura = 40 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  
  for($f1=9;$f1>=0;$f1--){
    for($f2=9;$f2>=0;$f2--){
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }

//Desenho da barra

//Guarda inicial
?>
  <img src="imagens/p.gif" width="<?php echo $fino; ?>" height="<?php echo $altura; ?>" border="0" />
  <img src="imagens/b.gif" width="<?php echo $fino; ?>" height="<?php echo $altura; ?>" border="0" />
  <img src="imagens/p.gif" width="<?php echo $fino; ?>" height="<?php echo $altura; ?>" border="0" />
  <img src="imagens/b.gif" width="<?php echo $fino; ?>" height="<?php echo $altura; ?>" border="0" />
<?php
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
   <img src="imagens/p.gif" width="<?php echo $f1; ?>" height="<?php echo $altura; ?>" border="0" />
<?php
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
  <img src="imagens/b.gif" width="<?php echo $f2; ?>" height="<?php echo $altura; ?>" border="0" />
<?php
  }
}

// Draw guarda final
?>
<img src="imagens/p.gif" width="<?php echo $largo; ?>" height="<?php echo $altura; ?>" border="0" />
<img src="imagens/b.gif" width="<?php echo $fino; ?>" height="<?php echo $altura; ?>" border="0" />
<img src="imagens/p.gif" width="<?php echo 1; ?>" height="<?php echo $altura; ?>" border="0" />
  <?php
} //Fim da função

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}
	
?>