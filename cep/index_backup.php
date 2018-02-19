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

        <script>
            $(function () {
                $("#cep").inputmask("99999-999");
            });
            
            function buscaCep()
            {
                var dadosCepJson = "";
                
                if($('#cep').val()!=="")
                {
                    dadosCepJson = $.ajax({
                       url:'controller.class.php',
                       async:false,
                       data:'cep='+$('#cep').val(),
                       method:'post'
                    }).responseText;
                    
                    if(!!dadosCepJson==0)// o !! valida o dado da variavel como boolean
                    {
                        alert('CEP não encontrado, insira os dados manualmente');
                    }
                    else
                    {
                        dadosCepJson = JSON.parse(dadosCepJson);

                        $('#nomeRua').val(dadosCepJson.opcoes[0].rua);
                        $('#nomeBairro').val(dadosCepJson.opcoes[0].bairro);
                        $('#uf').val(dadosCepJson.opcoes[0].estado);
                        $('#nomeCidade').val(dadosCepJson.opcoes[0].cidade);
                        $('#cepEndereco').val(dadosCepJson.opcoes[0].cep);
                    }
                }
            }
            
        </script>

        <fieldset>
           <form action="" method="get">
            <legend>Informe o CEP</legend>
            <input type="text" id="cep" >
            <button type="button" onclick="buscaCep()">Consultar CEP</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>Dados do CEP</legend>
            
            <input type="text" id="nomeRua" placeholder="Nome da rua">
            <input type="text" id="nomeBairro" placeholder="Bairro">
            <input type="text" id="uf" placeholder="UF" maxlength="2">
            <input type="text" id="nomeCidade" placeholder="Cidade">
        </fieldset>

    </body>
</html>