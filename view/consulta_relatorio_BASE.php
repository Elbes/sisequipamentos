<?php
session_start(); //Utilizamos a session_start pois estamos usando variavel de sessao
include "conexao.php"; //Abre a conexao com o banco
include "processamento/valida_login.php";//verifica se foi feito login ou se ele digitou o caminho no navegador, se digitou o caminho o sistema retorna para o index
?>

<html>
<head>
<title>..:: SAU - Consulta Relatorio ::..</title>

<!-- importacao do css -->
<style type="text/css">
	@import url(css/estilo.css);
	</style>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/tabela.css" rel="stylesheet" type="text/css" />
<!-- fim do css -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("input").focus(function(){
    $(this).css("background-color","#cccccc");
  });
  $("input").blur(function(){
    $(this).css("background-color","#ffffff");
  });
});
</script>
  <script language="JavaScript">
function abrir(URL) {
 
  var width = 1024;
  var height = 768;
 
  var left = 999;
  var top = 999;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
function SomenteNumero(e){
 var tecla=(window.event)?event.keyCode:e.which;
 if((tecla>47 && tecla<58)) return true;
 else{
 if (tecla==8 || tecla==0) return true;
 else  return false;
 }
}
function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].data.value = data;
                  return true;
              }
         }
         
      function mascaraData1(campoData1){
              var data1 = campoData1.value;
              if (data1.length == 2){
                  data1 = data1 + '/';
                  document.forms[0].data1.value = data1;
      return true;              
              }
              if (data1.length == 5){
                  data1 = data1 + '/';
                  document.forms[0].data1.value = data1;
                  return true;
              }
         }

</script>
</head>

<body> 
<center>

<!-- Aqui criamos o corpo da aplicação (onde ficara os campos e menu) -->
<div id="corpo3" align="center">
 
<!-- Formulario visual --> 
 <fieldset id="fieldconsulta_rel">
<!-- Titulo do formulario visual -->
 <p align="center" id="titulousuario">CONSULTAR RELATORIO</p>
 <?php
 //Recebe a data via GetString (url)  
 $data = $_GET["data"];
 $data1 = $_GET["data1"];
 $local = $_GET["local"];
 $situacao = $_GET["situacao"];
 $sla = $_GET["sla"];
 $sla_=$sla;
 $nivel = $_GET["nivel"];
 ?>
 
 <!-- ##################### PESQUISA ############# -->
 
 <!-- formulario onde serao tratados os dados -->
  <form method="get" action="consulta_relatorio.php">
 
 <!-- CAMPOS DO FORMULARIO   Utilizados  echo $dados[''] para que os campos sejam preenchidos conforme os dados do banco -->
  <p align="left">DATA: <input type="text" name="data1" value="<?php echo $data1; ?>" size="10" maxlength="10" onkeypress="return SomenteNumero(event);" OnKeyUp="mascaraData1(this);"/><input type="text" name="data" value="<?php echo $data; ?>" size="10"maxlength="10" onkeypress="return SomenteNumero(event);" OnKeyUp="mascaraData(this);"/>  LOCALIDADE : <select name="local">
               <?php
//Segue o mesmo conceito da situação

if ($local == "SEDE"){
	echo "<option value=\"SEDE\" selected=\"selected\">TRT - Sede</option> ";
  	echo "<option value=\"FORO\">TRT - Foro de Brasilia</option> ";
	echo "<option value=\"PREDIO APOIO\">TRT - Predio de apoio</option> ";
        echo "<option value=\"GAMA\">TRT - Gama</option> ";
        echo "<option value=\"TAGUATINGA\">TRT - Taguatinga</option> ";
	  echo "<option value=\"TODAS\">TODAS</option> ";
	}
if ($local == "FORO"){
	echo "<option value=\"SEDE\">TRT - Sede</option> ";
  	echo "<option value=\"FORO\"  selected=\"selected\">TRT - Foro de Brasilia</option> ";
	echo "<option value=\"PREDIO APOIO\">TRT - Predio de apoio</option> ";
        echo "<option value=\"GAMA\">TRT - Gama</option> ";
        echo "<option value=\"TAGUATINGA\">TRT - Taguatinga</option> ";
	 echo "<option value=\"TODAS\">TODAS</option> ";
	}
	
if ($local == "PREDIO APOIO"){
	echo "<option value=\"SEDE\">TRT - Sede</option> ";
  	echo "<option value=\"FORO\">TRT - Foro de Brasilia</option> ";
	echo "<option value=\"PREDIO APOIO\" selected=\"selected\">TRT - Predio de apoio</option> ";
        echo "<option value=\"GAMA\">TRT - Gama</option> ";
        echo "<option value=\"TAGUATINGA\">TRT - Taguatinga</option> ";
	 echo "<option value=\"TODAS\">TODAS</option> ";
	}
if ($local == "GAMA"){
	echo "<option value=\"SEDE\">TRT - Sede</option> ";
  	echo "<option value=\"FORO\">TRT - Foro de Brasilia</option> ";
	echo "<option value=\"PREDIO APOIO\">TRT - Predio de apoio</option> ";
        echo "<option value=\"GAMA\"selected=\"selected\">TRT - Gama</option> ";
        echo "<option value=\"TAGUATINGA\">TRT - Taguatinga</option> ";
	  echo "<option value=\"TODAS\">TODAS</option> ";
	}
if ($local == "TAGUATINGA"){
	echo "<option value=\"SEDE\">TRT - Sede</option> ";
  	echo "<option value=\"FORO\">TRT - Foro de Brasilia</option> ";
	echo "<option value=\"PREDIO APOIO\">TRT - Predio de apoio</option> ";
        echo "<option value=\"GAMA\">TRT - Gama</option> ";
        echo "<option value=\"TAGUATINGA\" selected=\"selected\">TRT - Taguatinga</option> ";
	 echo "<option value=\"TODAS\">TODAS</option> ";
	}
	if ($local == "TODAS"){
	echo "<option value=\"SEDE\">TRT - Sede</option> ";
  	echo "<option value=\"FORO\">TRT - Foro de Brasilia</option> ";
	echo "<option value=\"PREDIO APOIO\">TRT - Predio de apoio</option> ";
        echo "<option value=\"GAMA\">TRT - Gama</option> ";
        echo "<option value=\"TAGUATINGA\">TRT - Taguatinga</option> ";
	 echo "<option value=\"TODAS\" selected=\"selected\">TODAS</option> ";
	}


 ?>
          </select>   SITUACAO <select name="situacao">
 <?php
         if ($situacao == "pendente"){
	echo "<option value=\"pendente\" selected=\"selected\">PENDENTE</option> ";
  	echo "<option value=\"resolvido\">RESOLVIDO</option> ";
        echo "<option value=\"todos\">TODOS</option> ";
        echo "<option value=\"Aberto\">ABERTO</option> ";
        echo "<option value=\"cancelado\">CANCELADO</option> ";
	}
        
	if ($situacao == "resolvido"){
	echo "<option value=\"resolvido\" selected=\"selected\">RESOLVIDO</option> ";
  	echo "<option value=\"pendente\">PENDENTE</option> ";
	echo "<option value=\"todos\">TODOS</option> ";
        echo "<option value=\"Aberto\">ABERTO</option> ";
        echo "<option value=\"cancelado\">CANCELADO</option> ";
	}
        if ($situacao == "todos"){
	echo "<option value=\"resolvido\">RESOLVIDO</option> ";
  	echo "<option value=\"pendente\">PENDENTE</option> ";
	echo "<option value=\"todos\" selected=\"selected\">TODOS</option> ";
        echo "<option value=\"Aberto\">ABERTO</option> ";
        echo "<option value=\"cancelado\">CANCELADO</option> ";
	}
         if ($situacao == "Aberto"){
	echo "<option value=\"resolvido\">RESOLVIDO</option> ";
  	echo "<option value=\"pendente\">PENDENTE</option> ";
	echo "<option value=\"todos\">TODOS</option> ";
        echo "<option value=\"Aberto\" selected=\"selected\">ABERTO</option> ";
	echo "<option value=\"cancelado\">CANCELADO</option> ";
        
         }
         if ($situacao == "cancelado"){
	echo "<option value=\"resolvido\">RESOLVIDO</option> ";
  	echo "<option value=\"pendente\">PENDENTE</option> ";
	echo "<option value=\"todos\">TODOS</option> ";
        echo "<option value=\"Aberto\">ABERTO</option> ";
        echo "<option value=\"cancelado\" selected=\"selected\">CANCELADO</option> ";
	}

 ?>
               </select>NIVEL: <select name="nivel"> 
<?php

       if ($nivel == "1"){
	echo "<option value=\"1\" selected=\"selected\">1</option> ";
  	echo "<option value=\"2\">2</option> ";
	echo "<option value=\"3\">3</option> ";
       echo "<option value=\"todos\">TD</option> ";
	}
	if ($nivel == "2"){
	echo "<option value=\"1\">1</option> ";
  	echo "<option value=\"2\"selected=\"selected\">2</option> ";
	echo "<option value=\"3\">3</option> ";
       echo "<option value=\"todos\">TD</option> ";
	}
        if ($nivel == "3"){
	echo "<option value=\"1\">1</option> ";
  	echo "<option value=\"2\">2</option> ";
	echo "<option value=\"3\" selected=\"selected\">3</option> ";
       echo "<option value=\"todos\">TD</option> ";
	}
       
        if ($nivel == "todos"){
	echo "<option value=\"1\">1</option> ";
  	echo "<option value=\"2\">2</option> ";
	echo "<option value=\"3\">3</option> ";
  
        echo "<option value=\"todos\" selected=\"selected\">TD</option> ";
	}
        
	
	

 ?> 
                    </select> <i><b> SLA </b></i>
  <?php
     if($sla=="todas"){
     echo"<input type='radio' name='sla' value='cumprida' >OK";
     echo"<input type='radio' name='sla' value='estourada'>NEGATIVO";
     echo "<input type='radio' name='sla' value='todas' checked>TODAS";
     }
     if($sla=="cumprida"){
     echo"<input type='radio' name='sla' value='cumprida' checked>OK";
     echo"<input type='radio' name='sla' value='estourada'>NEGATIVO";
     echo "<input type='radio' name='sla' value='todas'>TODAS";
     }
     if($sla=="estourada"){
     echo"<input type='radio' name='sla' value='cumprida'>OK";
     echo"<input type='radio' name='sla' value='estourada' checked>NEGATIVO";
     echo "<input type='radio' name='sla' value='todas'>TODAS";
     }
    ?> 
 <p align="center"><input type="submit" name="pesquisar" value="Pesquisar" /></p>
 <!-- Fim do formulario -->
 </form>

 <!-- ################### FIM DA PESQUISA ############## -->
 

  <?php 
 //Converte a data do formato humano 11-11-2011 para o formato mysql 2011-11-11

  $d=explode("/",$data);
 $data2=$d[2]."-".$d[1]."-".$d[0];
 
 $d1=explode("/",$data1);
 $data4=$d1[2]."-".$d1[1]."-".$d1[0];
 
 
  
  if(( $local =='TODAS')&&($situacao == 'todos')&&($sla =='todas')&&($nivel=='todos'))
        {
        $consulta = mysql_query ("SELECT * FROM chamado where dataChamado BETWEEN '$data4' AND '$data2' order by dataChamado asc");
        }
         else if(($sla=='todas')&&($local =='TODAS')&&($situacao == 'todos'))
                                                         {
                                                         $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND nivelChamado ='$nivel' order by dataChamado asc");
                                                         }
        else if(($situacao == 'todos')&&($sla =='todas')&&($nivel=='todos')) 
              {
              $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' order by dataChamado asc");
              }
              else if(($local =='TODAS')&&($sla =='todas')&&($nivel=='todos')) 
                     {
                     $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado ='$situacao' order by dataChamado asc");
                     }
                      else if(($local =='TODAS')&&($situacao == 'todos')&&($sla =='todas'))
                            {
                            $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' nivelChamado='$nivel'  order by dataChamado asc");
                            } 
                            else if(($sla =='todas')&&($nivel=='todos'))
                                    {
                                    $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND situacaoChamado ='$situacao' order by dataChamado asc");
                                    }
                                    else if(($sla =='todas')&&($situacao=='todos'))
                                            {
                                            $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND nivelChamado='$nivel' order by dataChamado asc");
                                            }
                                            else if(($sla =='todas')&&($local=='TODAS'))
                                                    {
                                                    $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado ='$situacao' AND nivelChamado='$nivel' order by dataChamado asc");
                                                    }
                                                    else if($sla =='todas')
                                                           {
                                                           $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND situacaoChamado ='$situacao' AND nivelChamado ='$nivel' order by dataChamado asc");
                                                           }  
   
                            
                            
    else if(($sla =='estourada')&&($situacao == 'todos')&&($local =='TODAS')&&($nivel=='todos'))
           {
           $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2'  AND slaMostrar >'1' order by dataChamado asc");
           }
           else if(($sla =='estourada')&&($situacao == 'todos')&&($local =='TODAS'))
           {
           $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND nivelChamado ='$nivel'  AND slaMostrar >'1' order by dataChamado asc");
           }
           else if(($sla =='estourada')&&($local =='TODAS')&&($nivel=='todos'))
                  {
                  $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado ='$situacao' AND slaMostrar >'1' order by dataChamado asc");
                  }
                  else if(($sla =='estourada')&&($situacao == 'todos')&&($nivel=='todos'))
                         {
                         $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND slaMostrar >'1' order by dataChamado asc");
                         }
                         else if(($sla =='estourada')&&($nivel=='todos'))
                                {     
                                $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND situacaoChamado ='$situacao' AND slaMostrar >'1' order by dataChamado asc");
                                }
                                else if(($sla =='estourada')&&($situacao == 'todos'))
                                       {
                                       $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND nivelChamado ='$nivel' AND slaMostrar >'1' order by dataChamado asc");
                                       }
                                       else if(($sla =='estourada')&&($local == 'TODAS'))
                                              {
                                              $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado='$situacao' AND nivelChamado ='$nivel' AND slaMostrar >'1' order by dataChamado asc");
                                              }
                                              else if($sla =='estourada')
                                                     {
                                                     $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado='$situacao' AND nivelChamado ='$nivel' AND drtChamado ='$local' AND slaMostrar >'1' order by dataChamado asc");
                                                     }
           
    else if(($sla =='cumprida')&&($situacao == 'todos')&&($local =='TODAS')&&($nivel=='todos'))
           {
           $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2'  AND slaMostrar <='0' order by dataChamado asc");
           }
           else if(($sla =='cumprida')&&($situacao == 'todos')&&($local =='TODAS'))
           {
           $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND nivelChamado ='$nivel'  AND slaMostrar <='0' order by dataChamado asc");
           }
           else if(($sla =='cumprida')&&($local =='TODAS')&&($nivel=='todos'))
                  {
                  $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado ='$situacao' AND slaMostrar <='0' order by dataChamado asc");
                  }
                  else if(($sla =='cumprida')&&($situacao == 'todos')&&($nivel=='todos'))
                         {
                         $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND slaMostrar <='0' order by dataChamado asc");
                         }
                         else if(($sla =='cumprida')&&($nivel=='todos'))
                                {     
                                $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND situacaoChamado ='$situacao' AND slaMostrar <='0' order by dataChamado asc");
                                }
                                else if(($sla =='cumprida')&&($situacao == 'todos'))
                                       {
                                       $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND drtChamado ='$local' AND nivelChamado ='$nivel' AND slaMostrar <='0' order by dataChamado asc");
                                       }
                                       else if(($sla =='cumprida')&&($local == 'TODAS'))
                                              {
                                              $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado='$situacao' AND nivelChamado ='$nivel' AND slaMostrar <='0' order by dataChamado asc");
                                              }
                                              else if($sla =='cumprida')
                                                     {
                                                     $consulta = mysql_query ("SELECT * FROM chamado where dataChamado >='$data4' AND dataChamado <='$data2' AND situacaoChamado='$situacao' AND nivelChamado ='$nivel' AND drtChamado ='$local' AND slaMostrar <='0' order by dataChamado asc");
                                                     }
    
                                                     
                                                     
                                                    
 
 //Recebe o numero de relatorios
 $linhas = mysql_num_rows ($consulta);
  ?>

<!-- Cria um ScrollTable (barra de rolagem da tabela ) --> 
<div class="scrollTable">
<!-- Cria uma tabela -->
    <table class="header">
        <tr>
<!-- Titulo da tabela -->        
             <th class="coluna75px"> RELATORIO DIA <?php echo $data1; echo " AO DIA "; echo $data; ?></th>
              </tr>
   <!--Finaliza a tabela -->
    </table>
 
 
 <!-- Cria um scrollTable  (Barra de rolagem da tabela) -->   
 <div class="scroller">
        <!-- Cria uma tabela -->
        <table>
        <td class="coluna150px">  <?php echo "DATA";?></td>
        <td class="coluna150px">  <?php echo "SLAREAL";?></td>
         <td class="coluna150px">  <?php echo "ID";?></td>
        <td class="coluna150px">  <?php echo "LOCAL";?></td>
        <td class="coluna150px">  <?php echo "CATEGORIA";?></td>
        <td class="coluna150px">  <?php echo "SUBCATEGORIA";?></td>
        <td class="coluna150px">  <?php echo "TIPO";?></td>
        <td class="coluna150px">  <?php echo "STATUS";?></td>
        <td class="coluna150px">  <?php echo "USUARIO CRIADOR";?></td>
        <td class="coluna150px">  <?php echo "ULTIMA ALTERACAO";?></td>
<?php
//Se a quantidade de linha for igual a 0 ( ou seja se nao tiver nenhum chamado naquela situacao ) apresenta 
if($linhas == 0 ||$sla==" "){
	echo "<p align='center'>Nao existem chamados</p>";
	
}else{
//Caso o contrario, crie um lanço de repetição que preencha a tabela com os dados do banco
   for ($cont = 0; $cont < $linhas; $cont++) {
	       
//Pega os dados e armazena em uma array chamado DADOS	   
$dados = mysql_fetch_array($consulta); ?>
        <tr>
        <?php 
		//Recebe a data atual, definimos como Sao paulo para que seja pegada a data do Brasil, para nao correr o risco de pegar do Japao
	date_default_timezone_set('America/Sao_Paulo');
	//Joga a data em uma variavel Chamada data
          $data = date("d/m/Y"); 
//Converte a data do formato mysql 2011-11-11 para o formato humano 11-11-2011		
		$data = $dados['dataChamado'];
		$d=explode("-",$data);
        $data=$d[2]."/".$d[1]."/".$d[0];
		
     
        ?>
        
            
            
<!-- Apresenta o numero do chamado e ao clicar direciona para a pagina alterar-chamado.php  enviando o id via getString (url) -->
         
          
<!-- Apresenta a data do chamado -->        
        <td class="coluna150px">  <?php echo $data;?></td>
           <?php  
		//Recebe a data atual, definimos como Sao paulo para que seja pegada a data do Brasil, para nao correr o risco de pegar do Japao
	  date_default_timezone_set('America/Sao_Paulo');
	//Joga a data em uma variavel Chamada data
          // Conta para o dia de Hoje....  
          $datahr = date("d/m/Y H:i:s"); 
            
           $datahr1 = explode(' ',$datahr); 
           
           $horagora = $datahr1[1];
           $ha=explode(":",$horagora);
           
           $diaagora = $datahr1[0];
           
           $da=explode("/",$diaagora);
           
           
           $diaagorafinal = $ha[0]*3600+$ha[1]*60+$ha[2]+$da[1]*2592000+$da[0]*86400+$da[2]*31104000;
           
           //Fim da conta e variaveis arrumadas, organizadas
//ano mes dia segundo minuto hora

//A fun?o mktime recebe os argumentos (hora, minuto, segundos, mes, dia, ano)
           
           //Conta para o dia salvo.
           
           $diasv = $dados['dataChamado'];
           
           $dsv = explode('-',$diasv); 
           
           $horasv = $dados['timehora'];
           $dia_chamado = $dados['diaChamado'];
           
           $hsv = explode(':',$horasv);
           
           $diasalvofinal = $hsv[0]*3600+$hsv[1]*60+$hsv[2]+$dsv[1]*2592000+$dsv[2]*86400+$dsv[0]*31104000;
           
            
           //Fim da conta e variaveis arrumadas, organizadas
           
           $sla = ($diaagorafinal-$diasalvofinal);
           
           
            ////////////////////////////////////////
           // faz a conta para acrescer horas se o chamado ta no n3 ou passou pelo n3

                $acresceChamado = $dados['acresceChamado'];
                
                if(($acresceChamado==1)){
                if(($dia_chamado=="Monday")&&($hsv[0]<10)){
                $contrato=104+104;
                
                }
                else {
                $contrato=152+152;
                
                }
                }
                else{
                  if(($dia_chamado=="Monday")&&($hsv[0]<10)){
                  $contrato=104;
                  }
                  else {
                  $contrato=152;
                  }
                  }

           ////////////////////////////////////////
           $slacontratada = $contrato*60*60;
           
           $timefinal = $slacontratada-$sla;
           
           
           
           $min =$timefinal/60 ;
           
           $minaltera = $min/60; 
           
           $mincerto = (int)$minaltera;
           
           
           $trataminuto =($minaltera-$mincerto)*60;
           
           $trataminuto1 = (int)$trataminuto;
           
           
           $hr= (int)($min/60) ;
           

               $horaaltera = $hr/24; 
           
           $horacerto = (int)$horaaltera;
           
           
           $tratahor =($horaaltera-$horacerto)*24;
           
          
                              
        
           
            $tratahora = (int)$tratahor;
           
           
           $diasla = (int)($hr/24);
           
                ?>
        
              <?php 
              if(($timefinal>0)&&($timefinal<7200)&&($dados["situacaoChamado"]!='resolvido')&&($dados["situacaoChamado"]!='cancelado')){
                echo "<td class='coluna150px'> <b><font color='#FFFF00'>$diasla d $tratahora hr  $trataminuto1 m </td>";
            
              }
            
               else if(($timefinal<0)&&($dados["situacaoChamado"]!='resolvido')&&($dados["situacaoChamado"]!='cancelado')){
                echo "<td class='coluna150px'> <b><font color='#FF00'>$diasla d $tratahora hr  $trataminuto1 m </td>";
            
              }
              else if(($dados["situacaoChamado"]!='resolvido')&&($dados["situacaoChamado"]!='cancelado')){
                
              echo "<td class='coluna150px'>$diasla d $tratahora hr  $trataminuto1 m </td>";}
              
              else {
                  $slamostrar= $dados['slaChamado'];
                  echo "<td class='coluna150px'>$slamostrar</td>";
                  
                  }
              
        
                 $salvar="$diasla d $tratahora hr  $trataminuto1 m";
        
                $salvar1="$diasla d $tratahora  hr  $trataminuto1 m";
        
                
                $salvar_mostrar=(-1)*($diasla*24+$tratahora*60+$trataminuto1);
        
                $salvar1_mostrar=(1)/($diasla*24+$tratahora*60+$trataminuto1);
       
              
          $idcham = $dados['idChamado'];
          $sitcham = $dados['situacaoChamado'];
          $codigo = $idcham;
        
            if (($sitcham =='resolvido')||($sitcham =='cancelado')){ 
            
           
           echo "<td class='coluna150px'><a href='visualizar.php?codigo=$idcham'> $idcham </a></td>";
            
           }
           else if($timefinal<0){            
                echo "<td class='coluna150px'><a href='visualizar.php?codigo=$idcham'> $idcham </a></td>";
               
           }
           else {
                echo "<td class='coluna150px'><a href='visualizar.php?codigo=$idcham'> $idcham </a></td>";
               
           }       
             
          
               
               
           
           
           
                ?> 
        
<td class="coluna150px"><?php echo $dados['drtChamado'];?></td>
<td class="coluna150px" size="16"><?php echo $dados['catChamado'];?></td>
<td class="coluna150px" size="10"><?php echo $dados['subcatChamado'];?></td>
<td class="coluna150px"><?php echo $dados['tipoChamado'];?></td>
<td class="coluna150px"><?php echo $dados['situacaoChamado'];?></td>
<td class="coluna150px"><?php echo $dados['usuarioAbrir'];?></td>
<td class="coluna150px"><?php echo $dados['usuarioAltera'];?></td>
 </tr>
 
<?php

               if(($timefinal<0)&&($dados["situacaoChamado"]!='resolvido')&&($dados["situacaoChamado"]!='cancelado')){
               $inserirsla = mysql_query("update chamado set slaChamado = '$salvar',slaMostrar = '$salvar_mostrar' where idChamado = $codigo");
               $inserirslarelatorio = mysql_query("update relatorio set slaRelatorio = '$salvar',slaMostrar = '$salvar_mostrar' where idChamado = $codigo");
               
               }
               else
                   if(($dados["situacaoChamado"]!='resolvido')&&($dados["situacaoChamado"]!='cancelado'))
               {
                   $inserirsla = mysql_query("update chamado set slaChamado = '$salvar1',slaMostrar = '$salvar1_mostrar' where idChamado = $codigo");
                   $inserirslarelatorio = mysql_query("update relatorio set slaRelatorio = '$salvar1',slaMostrar = '$salvar1_mostrar' where idChamado = $codigo");
               }

           } //fim do for

}//fim do if
              
               
?>     
<!-- fim da tabela -->


</table>
<!-- fim do scroller -->
    </div>
<!-- fim do scrollTable -->   
    </div>
        
   <?php
 echo "<br/>";
echo "<p align='left'>* Clique sobre o ID do chamado para visualizar  ";
echo "<br/>";
echo "* Pesquisa retornou $linhas resultado(s)";
echo "<br/>";
echo "* SLA de 48 horas para todos os chamados ";
echo "<br/>";
echo "* Chamados que vão para o N3 Ganham mais 48Hrs para solucao<br/>";
echo "* Chamados com mais de 48 Horas ficam vermelhos, chamados proximos de estourar (2 Horas) ficam amarelos";

?>     
   <!-- Botao Voltar -->
  <p align="right">
  
  <input type="button" id="btnvoltar_relatorio" name="voltar" alt="Voltar" value="VOLTAR" onClick="history.go(-1)"  />
 </p>
       <a href="javascript:abrir('imprimir.php?data=<?php echo $data; ?>&data1=<?php echo $data1; ?>&local=<?php echo $local; ?>&situacao=<?php echo $situacao; ?>&sla=<?php echo $sla_; ?>&nivel=<?php echo $nivel; ?>');"  ><input name="imprimir" type="button" id="btnimprimir"  value="IMPRIMIR" /> </a>
 <!-- Fim do formulario -->   
 </fieldset>
   
 <!--  importacao do menu -->
 <?php include "menu.php" ?>
 
 
</DIV> <!-- Fecha Corpo -->


</center>

</body>
</html>
