<?php

require 'conexao.php';

//require 'classLogin.php';
class Demanda {

    private $id_demanda;
    private $nome_cliente;
    private $numero_linha;
    private $id_tipoDemanda;
    private $gerente;
    private $usuario;
    private $id_usuario;
    private $data_abertura;
    private $data_fechamento;
    private $obs_demanda;
    private $status;
    private $obs_demanda_gerente;
    private $numero_chamado;
    private $categoria;
    private $pesquisa;
    private $palavra;
    private $opcao;

    function getOpcao() {
        return $this->opcao;
    }

    function setOpcao($opcao) {
        $this->opcao = $opcao;
    }

    function getPalavra() {
        return $this->palavra;
    }

    function setPalavra($palavra) {
        $this->palavra = $palavra;
    }

    public function getIddemanda() {
        return $this->id_demanda;
    }

    public function setIddemanda($id_demanda) {
        $this->id_demanda = $id_demanda;
    }

    public function getNomecliente() {
        return $this->nome_cliente;
    }

    public function setNomecliente($nome_cliente) {
        $this->nome_cliente = $nome_cliente;
    }

    public function getNumerolinha() {
        return $this->numero_linha;
    }

    public function setNumerolinha($numero_linha) {
        $this->numero_linha = $numero_linha;
    }

    function getIdtipoDemanda() {
        return $this->id_tipoDemanda;
    }

    function setIdtipoDemanda($id_tipoDemanda) {
        $this->id_tipoDemanda = $id_tipoDemanda;
    }

    public function getGerente() {
        return $this->gerente;
    }

    public function setGerente($gerente) {
        $this->gerente = $gerente;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getIdusuario() {
        return $this->id_usuario;
    }

    function setIdusuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    public function getDataabertura() {
        return $this->data_abertura;
    }

    public function setDataabertura($data_abertura) {
        $this->data_abertura = $data_abertura;
    }

    public function getDatafechamento() {
        return $this->data_fechamento;
    }

    public function setDatafechamento($data_fechamento) {
        $this->data_fechamento = $data_fechamento;
    }

    public function getObsdemanda() {
        return $this->obs_demanda;
    }

    public function setObsdemanda($obs_demanda) {
        $this->obs_demanda = $obs_demanda;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getObsdemandagerente() {
        return $this->obs_demanda_gerente;
    }

    public function setObsdemandagerente($obs_demanda_gerente) {
        $this->obs_demanda_gerente = $obs_demanda_gerente;
    }

    public function getNumeroChamado() {
        return $this->numero_chamado;
    }

    public function setNumeroChamado($numero_chamado) {
        $this->numero_chamado = $numero_chamado;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getPesquisa() {
        return $this->pesquisa;
    }

    public function setPesquisa($pesquisa) {
        $this->pesquisa = $pesquisa;
    }

    public function CadastrarDemanda() {

//         if ($status == "Concluído" ){
//        $data_fechamento = date('Y/m/d');             
//        $this->data_fechamento = $data_fechamento;
//        $stmt->setDatafechamento($data_fechamento);
//    }
//               $data_fechamento = $_REQUEST["data_fechamento"];
//        }
        //Faz a conexao com o banco
        $con = Conexao::conectar();
        //Comnado sql que faz a inserção do usuario
        $sql = "INSERT INTO demanda(nome_cliente, numero_linha, id_tipoDemanda, obs_demanda, gerente, id_usuario, data_abertura, data_fechamento, status, obs_demanda_gerente, numero_chamado)VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        //Prepara a consulta quer dizer verifica se o comando sql e 
        //valido e armazena no atributo $stmt .//Com isso a sua query SQL está protegida de muitas das  //invasões, como por exemplo o SQL INJECTION, e também ele         //elimina todas as TAGS
        $stmt = $con->prepare($sql);

        // O comando bindParam vincula um parâmetro para a variável 
        // especificada. $this->getLogin() como os outros get pega o 
        // valor digitado pelo usuarios
//         $status = $this->getStatus();
//         if ($status == "Concluído"){
//               $data_fechamento = date('Y/m/d');
//                 echo $data_fechamento;            
//           }    

//        $telefone = $obj->numero_linha;
//        $data = $obj->data_abertura;
//        $data = implode("/", array_reverse(explode("-", $data)));

        
        
//        $telefone = implode('(', array_reverse(explode("", $telefone)));
//        $telefone = implode(')', array_reverse(explode("", $telefone)));
//        $telefone = implode('-', array_reverse(explode("", $telefone)));
        
//        $telefone = str_replace("(", "", $telefone);
//        $telefone = str_replace(")", "", $telefone);
//        $telefone = str_replace("-", "", $telefone);
        
        $stmt->bindParam(1, $this->getNomecliente());
        $stmt->bindParam(2, $this->getNumerolinha());
        $stmt->bindParam(3, $this->getIdtipoDemanda());
        $stmt->bindParam(4, $this->getObsdemanda());
        $stmt->bindParam(5, $this->getGerente());
        $stmt->bindParam(6, $this->getIdusuario());
        $stmt->bindParam(7, $this->getDataabertura());
        $stmt->bindParam(8, $this->getDatafechamento());
        $stmt->bindParam(9, $this->getStatus());
        $stmt->bindParam(10, $this->getObsdemandagerente());
        $stmt->bindParam(11, $this->getNumeroChamado());

//        $stmt->bindParam(7, $this->getObsdemandagerente());
        // O comando execute(), é o comando que vai executar a query 
        // SQL com os valores do bindParam já validados
        $result = $stmt->execute();

        if ($result == false) {
            unset($con);
            return $stmt->errorInfo();
        } else {
            unset($con);
            return $result;
        }
    }

    public function dadosAdmin($id_demanda) {

        $con = Conexao::conectar();
        $stmt = $con->query("Select * from demanda where id_demanda = '$id_demanda'");
        $obj = $stmt->fetchObject();
        $dados = array(
            $obj->id_demanda,
            $obj->nome_cliente,
            $obj->numero_linha,
            $obj->id_tipoDemanda,
            $obj->obs_demanda,
            $obj->usuario,
            $obj->gerente,
            $obj->data_abertura,
            $obj->data_fechamento,
            $obj->obs_demanda_gerente,
            $obj->status,
            $obj->numero_chamado,
        );
        return $dados;
    }

//            function format($mask,$string)
//        {
//            return  vsprintf($mask, str_split($string));
//        }
        
    public function listarDemanda() {
//        session_start();
        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) INNER JOIN usuario ON (demanda.id_usuario = usuario.id_usuario)  where gerente = '$usuario' and status ='Novo' or gerente = '$usuario' and status ='Pendente' or gerente = '$usuario' and status ='Em progresso'");
//        $stmt = $con->query("Select * from demanda where gerente = '$usuario'");
        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            $data2 = $obj->data_fechamento;
            $data2 = implode("/", array_reverse(explode("-", $data2)));
            
            
            $telefone = $obj->numero_linha;

            $numero = substr($telefone, 0, 2);  // 619999-9999 61
            $numero2 = substr($telefone, 3, 4);  // 9999
            $numero3 = substr($telefone, 6, 10);  // 9999
            $numero4 = "(" . $numero . ")" . " " . $numero2 . "-" . $numero3;
 
            echo "
               <tr>
                   <td>$obj->id_demanda</td>
                   <td>$obj->nome_cliente</td> 
                   <td>$numero4</td>
                   <td>$obj->tipo_demanda</td>    
                   <td>$obj->obs_demanda</td>
                   <td>$obj->nome_usuario</td>             
                   <td>$obj->gerente</td>    
                   <td>$data</td>
                   <td>$obj->obs_demanda_gerente</td>        
                   <td>$obj->status</td>
                   
                       
                     <form method='post' action='editar_demanda.php'>
                                     <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}>
                                <td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                            </form>
                            
                                <form method='post' action='../control/executar_exclusao_demanda.php'>
                                      <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}> 
                                <td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
            
                                </form>";
        }

        unset($con);
    }

    public function listarDemanda2() {

//        session_start();
        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where usuario = '$usuario' and status ='Novo' or usuario = '$usuario' and status ='Pendente' or usuario = '$usuario' and status ='Em progresso'");
//        $stmt = $con->query("Select * from demanda where usuario = '$usuario'");
        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_abertura;
            $data = implode("/", array_reverse(explode("-", $data)));

            $data2 = $obj->data_fechamento;
            $data2 = implode("/", array_reverse(explode("-", $data2)));

            echo "
               <tr>
                   <td>$obj->id_demanda</td>
                   <td>$obj->nome_cliente</td>    
                   <td>$obj->numero_linha</td>
                   <td>$obj->tipo_demanda</td>    
                   <td>$obj->obs_demanda</td>
                   <td>$obj->usuario</td>             
                   <td>$obj->gerente</td>    
                   <td>$data</td>
                   <td>$obj->obs_demanda_gerente</td>        
                   <td>$obj->status</td>   
                       
                    <form method='post' action='editar_demanda.php'>
                                     <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}>
                                <td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                            </form>
                            
                                <form method='post' action='../control/executar_exclusao_demanda.php'>
                                      <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}> 
                                <td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
            
                                </form>";
        }
        unset($con);
    }

    public function listarDemanda33() {
//    public function listarDemanda33($palavra, $opcao, $data_inicial, $data_final, $status) {

               
        $con = Conexao::conectar();
//        $usuario = $_SESSION['username'];
            
        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda)");    
//        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final'");    
//        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final'");    
        
        
        $result = $stmt->rowCount();

        if ($result >= 1) {

            while ($obj = $stmt->fetchObject()) {

                $data = $obj->data_abertura;
                $data = implode("/", array_reverse(explode("-", $data)));
                
                $data2 = $obj->data_fechamento;
                $data2 = implode("/", array_reverse(explode("-", $data2)));

                echo "
                            <tr>
                            <td>$obj->id_demanda</td>
                            <td>$obj->nome_cliente</td>    
                            <td>$obj->numero_linha</td>
                            <td>$obj->tipo_demanda</td>    
                            <td>$obj->obs_demanda</td>
                            <td>$obj->usuario</td>             
                            <td>$obj->gerente</td>    
                            <td>$data</td>
                            <td>$obj->obs_demanda_gerente</td>        
                            <td>$obj->status</td>
                            <td>$data2</td>";
                                                       
            }
        } else {
                           echo "<td class='bg-danger text-center' colspan='12'>Não foi encontrado nenhum resultado para</td>";
            //            echo "<td><div class='col-md-6'><p class='bg-danger text-center'>Não foi encontrado nenhum resultado para <strong>" . $palavra . "</strong></p></div></td>";
        }
    }

    
    public function listarDemanda3($palavra, $opcao, $data_inicial, $data_final, $status) {

//         $data = $obj->data_abertura;
            $data_inicial = implode("-", array_reverse(explode("/", $data_inicial)));
            $data_final = implode("-", array_reverse(explode("/", $data_final)));
               
        $con = Conexao::conectar();
        $usuario = $_SESSION['username'];
        
        if($opcao == "todos" and $status == "selecione"){
            
        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final'");    
//        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final'");    
        }
        
        if($opcao == "todos" and $status <> "selecione"){
            
              $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final' and status = '$status'");
            
        }
        
        if($opcao <> "todos" and $status <>"selecione"){
        
            $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final' and status = '$status' and $opcao LIKE '%" . $palavra . "%'");
        }
        
        if ($status == "selecione" and $opcao <> "todos"){
            
            $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where data_abertura between '$data_inicial' and '$data_final' and $opcao LIKE '%" . $palavra . "%'");
                    
        }

        $result = $stmt->rowCount();

        if ($result >= 1) {

            while ($obj = $stmt->fetchObject()) {

                $data = $obj->data_abertura;
                $data = implode("/", array_reverse(explode("-", $data)));
                
                $data2 = $obj->data_fechamento;
                $data2 = implode("/", array_reverse(explode("-", $data2)));

                echo "
                            <tr>
                            <td>$obj->id_demanda</td>
                            <td>$obj->nome_cliente</td>    
                            <td>$obj->numero_linha</td>
                            <td>$obj->tipo_demanda</td>    
                            <td>$obj->obs_demanda</td>
                            <td>$obj->usuario</td>             
                            <td>$obj->gerente</td>    
                            <td>$data</td>
                            <td>$obj->obs_demanda_gerente</td>        
                            <td>$obj->status</td>
                            <td>$data2</td>";
                                                       
            }
        } else {
                           echo "<td class='bg-danger text-center' colspan='12'>Não foi encontrado nenhum resultado para <strong>" . $palavra . "</strong></td>";
            //            echo "<td><div class='col-md-6'><p class='bg-danger text-center'>Não foi encontrado nenhum resultado para <strong>" . $palavra . "</strong></p></div></td>";
        }
    }

    public function listarDemanda4($palavra, $opcao) {

        $con = Conexao::conectar();
        $usuario = $_SESSION['username'];
        $stmt = $con->query("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where usuario = '$usuario' and $opcao LIKE '%" . $palavra . "%'");
        $result = $stmt->rowCount();

        if ($result >= 1) {

            while ($obj = $stmt->fetchObject()) {

                $data = $obj->data_abertura;
                $data = implode("/", array_reverse(explode("-", $data)));

                echo "
                
                        <tr>
                            <td>$obj->id_demanda</td>
                            <td>$obj->nome_cliente</td>    
                            <td>$obj->numero_linha</td>
                            <td>$obj->tipo_demanda</td>    
                            <td>$obj->obs_demanda</td>
                            <td>$obj->usuario</td>             
                            <td>$obj->gerente</td>    
                            <td>$data</td>
                            <td>$obj->obs_demanda_gerente</td>        
                            <td>$obj->status</td>
                            
                                <form method='post' action='editar_demanda.php'>
                                     <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}>
                                <td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                            </form>
                            
                                <form method='post' action='../control/executar_exclusao_demanda.php'>
                                      <input type='hidden' class='btn btn-primary' name='id_demanda' value={$obj->id_demanda}> 
                                <td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
            
                                </form>";
            }
        } else {
            echo "<td class='bg-danger text-center' colspan='12'>Não foi encontrado nenhum resultado para <strong>" . $palavra . "</strong></td>";
            //            echo "<td><div class='col-md-6'><p class='bg-danger text-center'>Não foi encontrado nenhum resultado para <strong>" . $palavra . "</strong></p></div></td>";
        }
    }

    public function listar_TipoDemanda() {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from tipo_demanda");
        // Percorrento um resultset com while
//        echo "<option>teste</option>";
        while ($obj = $stmt->fetchObject()) {

            echo "
                 <option value='$obj->id_tipoDemanda'>$obj->tipo_demanda</option>;
                 ";
            unset($con);
        }
    }

    public function listar_TipoDemandaAtual($tipo) {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from tipo_demanda where id_tipoDemanda = '$tipo'");
        // Percorrento um resultset com while
//        echo "<option>teste</option>";
        while ($obj = $stmt->fetchObject()) {

            echo "
                 <option value='$obj->id_tipoDemanda'>$obj->tipo_demanda</option>;
                 ";
            unset($con);
        }
    }

    public function alterarDemanda($id) {

        $con = Conexao::conectar();

        $sql = "UPDATE demanda SET nome_cliente = ? , numero_linha = ? ,
               id_tipoDemanda = ? , obs_demanda = ? , gerente = ? , status = ? , data_fechamento = ? , obs_demanda_gerente = ? , numero_chamado = ?  WHERE id_demanda = ?";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(1, $this->getNomecliente());
        $stmt->bindParam(2, $this->getNumerolinha());
        $stmt->bindParam(3, $this->getIdtipoDemanda());
        $stmt->bindParam(4, $this->getObsdemanda());
        $stmt->bindParam(5, $this->getGerente());
        $stmt->bindParam(6, $this->getStatus());
        $stmt->bindParam(7, $this->getDatafechamento());
        $stmt->bindParam(8, $this->getObsdemandagerente());
        $stmt->bindParam(9, $this->getNumeroChamado());
        $stmt->bindParam(10, $id);

        $result = $stmt->execute();

        if ($result == false) {
            return $stmt->errorInfo();
        } else {
            unset($con);
            return $result;
        }
    }

    public function excluirUsuario() {

        $con = Conexao::conectar();

//        $stmt->bindParam(1, $this->getNomecliente());
//            $id = $obj->id_demanda;


        $id = $this->getIddemanda();

        $stmt = $con->query("DELETE FROM demanda WHERE id_demanda = $id");

        $result = $stmt->execute();
        if ($result == false) {
            return $stmt->errorInfo();
        } else {
            unset($con);
            return $result;
        }
    }

    public function contDemanda() {

        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();

        $stmt = $con->prepare("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where gerente = '$usuario' and status ='Novo' or gerente = '$usuario' and status ='Pendente' or gerente = '$usuario' and status ='Em progresso'");

        $stmt->execute();
        $count = $stmt->rowCount();


        echo $count;
    }

    public function contDemanda2() {

        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->prepare("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda) where usuario = '$usuario' and status ='Novo' or usuario = '$usuario' and status ='Pendente' or usuario = '$usuario' and status ='Em progresso'");

        $stmt->execute();
        $count = $stmt->rowCount();
        echo $count;
//        return $count;
    }
    
    
    public function contNum() {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();

        $stmt = $con->prepare("Select * from demanda INNER JOIN tipo_demanda ON (demanda.id_tipoDemanda = tipo_demanda.id_tipoDemanda)");

        $stmt->execute();
        $count = $stmt->rowCount();


        return $count;
    }
    
}

?>
