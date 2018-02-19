<?php

//include_once "conexao.php";

class Admin {

    private $id_cargo;
    private $id_loja;
    private $nome_cargo;
    private $id_usuario;
    private $nome_usuario;
    private $sobrenome_usuario;
    private $cargo;
    private $nivel;
    private $matricula;
    private $email;
    private $senha;
    private $data_cadastro;
    private $status_usuario;
    private $novasenha_cripto;

    function getIdloja() {
        return $this->id_loja;
    }

    function setIdloja($id_loja) {
        $this->id_loja = $id_loja;
    }

    function getNomecargo() {
        return $this->nome_cargo;
    }

    function setNomecargo($nome_cargo) {
        $this->nome_cargo = $nome_cargo;
    }

    function getIdcargo() {
        return $this->id_cargo;
    }

    function setIdcargo($id_cargo) {
        $this->id_cargo = $id_cargo;
    }

    public function getIdusuario() {
        return $this->id_usuario;
    }

    public function setIdusuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getNomeusuario() {
        return $this->nome_usuario;
    }

    public function setNomeusuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }

    public function getSobrenomeusuario() {
        return $this->sobrenome_usuario;
    }

    public function setSobrenomeusuario($sobrenome_usuario) {
        $this->sobrenome_usuario = $sobrenome_usuario;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getDatacadastro() {
        return $this->data_cadastro;
    }

    public function setDatacadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    public function getStatususuario() {
        return $this->status_usuario;
    }

    public function setStatususuario($status_usuario) {
        $this->status_usuario = $status_usuario;
    }
    
    function getNovasenha_cripto() {
        return $this->novasenha_cripto;
    }

    function setNovasenha_cripto($novasenha_cripto) {
        $this->novasenha_cripto = $novasenha_cripto;
    }

    public function cadastrarUsuario() {
        require 'conexao.php';
        //Faz a conexao com o banco
        $con = Conexao::conectar();
        
//        $matricula = $this->matricula;
        $matricula = $this->getMatricula();
        
        $stmt = $con->prepare("Select * from usuario where matricula = '$matricula'");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            
         $count = 0;   
         
         return $count;
         exit();
        } else {
        
        //Comnado sql que faz a inserção do usuario

        $sql = "INSERT INTO usuario(nome_usuario, sobrenome_usuario, id_cargo, nivel, matricula, email, senha, data_cadastro, status_usuario, id_loja)VALUES(?,?,?,?,?,?,?,?,?,?)";
        //Prepara a consulta quer dizer verifica se o comando sql e 
        //valido e armazena no atributo $stmt .
        //Com isso a sua query SQL está protegida de muitas das 
        //invasões, como por exemplo o SQL INJECTION, e também ele 
        //elimina todas as TAGS
        $stmt = $con->prepare($sql);

        // O comando bindParam vincula um parâmetro para a variável 
        // especificada. $this->getLogin() como os outros get pega o 
        // valor digitado pelo usuarios
//        $senha = $this->getSenha();
//        $senha = md5($senha);

        $stmt->bindParam(1, $this->getNomeusuario());
        $stmt->bindParam(2, $this->getSobrenomeusuario());
        $stmt->bindParam(3, $this->getIdcargo());
        $stmt->bindParam(4, $this->getNivel());
        $stmt->bindParam(5, $this->getMatricula());
        $stmt->bindParam(6, $this->getEmail());
        $stmt->bindParam(7, $this->getSenha());
        $stmt->bindParam(8, $this->getDatacadastro());
        $stmt->bindParam(9, $this->getStatususuario());
        $stmt->bindParam(10, $this->getIdloja());

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
    }

    public function listarDadosUsuario() {
        //        session_start();
        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from usuario INNER JOIN cargo ON (usuario.id_cargo = cargo.id_cargo) INNER JOIN loja  ON (usuario.id_loja = loja.id_loja)");

        // Percorrento um resultset com while
        while ($obj = $stmt->fetchObject()) {

            $data = $obj->data_cadastro;
            $data = implode("/", array_reverse(explode("-", $data)));

            echo "
                   <tr>
                   
                   <td>$obj->matricula</td>    
                   <td>$obj->nome_usuario $obj->sobrenome_usuario</td>
                   <td>$obj->nome_cargo</td>
                   <td>$obj->nivel</td>    
                   <td>$obj->email</td>
                   <td>$obj->nome_loja</td>             
                   <td>$data</td>
                   <td>$obj->status_usuario</td>        
                       
                    <form method='post' action='editar_usuario.php'>
                   <input type='hidden' class='btn btn-primary' name='id_usuario' value={$obj->id_usuario}>
                    <td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary' data-title='Alterar'><span class='glyphicon glyphicon-pencil'></span></button></p></td>
                 </form>
                <form method='post' action='../control/executar_exclusao_usuario.php'>
                   <input type='hidden' class='btn btn-primary' name='id_usuario' value={$obj->id_usuario}> 
                    <td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger' data-title='Excluir'><span class='glyphicon glyphicon-trash'></span></button></p></td>
            
                </form>";

            unset($con);
        }
    }

    public function listarCargo() {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from cargo");
        // Percorrento um resultset com while
//        echo "<option>teste</option>";
        while ($obj = $stmt->fetchObject()) {

            echo "
                 <option value='$obj->id_cargo'>$obj->nome_cargo</option>;
                 ";
            unset($con);
        }
    }

    public function listar_CargoAtual($cargo) {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from cargo where id_cargo = '$cargo'");
        // Percorrento um resultset com while
//        echo "<option>teste</option>";
        while ($obj = $stmt->fetchObject()) {

            echo "
                 <option value='$obj->id_cargo'>$obj->nome_cargo</option>;
                 ";
            unset($con);
        }
    }

    public function dadosCargo($id_usuario) {

        $con = Conexao::conectar();
        $stmt = $con->query("Select * from usuario INNER JOIN cargo ON (usuario.id_cargo = cargo.id_cargo) where id_cargo = '$id_cargo'");

        while ($obj = $stmt->fetchObject()) {

            echo "  
                <option value='$obj->id_cargo'>$obj->nome_cargo</option>
                 ";
            unset($con);
        }
    }

    public function listarLoja() {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from loja");
        // Percorrento um resultset com while
//        echo "<option>teste</option>";
        while ($obj = $stmt->fetchObject()) {

            echo "
                 <option value='$obj->id_loja'>$obj->nome_loja</option>;
                 ";
            unset($con);
        }
    }

    public function listar_LojaAtual($id_loja) {

//        $usuario = $_SESSION['username']; //pronto, sua variavel será a que ele utilizou para logar     
        $con = Conexao::conectar();
        $stmt = $con->query("Select * from loja where id_loja = '$id_loja'");
        // Percorrento um resultset com while
//        echo "<option>teste</option>";
        while ($obj = $stmt->fetchObject()) {

            echo "
                 <option value='$obj->id_loja'>$obj->nome_loja</option>;
                 ";
            unset($con);
        }
    }

    public function dadosUsuario($id_usuario) {

        $con = Conexao::conectar();
        $stmt = $con->query("Select * from usuario where id_usuario = '$id_usuario'");
        $obj = $stmt->fetchObject();
        $dados = array(
            $obj->id_usuario,
            $obj->nome_usuario,
            $obj->sobrenome_usuario,
            $obj->cargo,
            $obj->nivel,
            $obj->email,
            $obj->senha,
            $obj->data_cadastro,
            $obj->status_usuario,
        );
        return $dados;
    }

    public function dadosAdmin($id_usuario) {

        $con = Conexao::conectar();
        $stmt = $con->query("Select * from usuario where id_usuario = '$id_usuario'");
        $obj = $stmt->fetchObject();
        $dados = array(
            $obj->id_usuario,
            $obj->nome_usuario,
            $obj->sobrenome_usuario,
            $obj->id_cargo,
            $obj->nivel,
            $obj->email,
            $obj->senha,
            $obj->data_cadastro,
            $obj->status_usuario,
            $obj->id_loja,
            $obj->matricula,
        );
        return $dados;
    }

    public function verificaMatricula($matricula) {
        require 'conexao.php';
        $con = Conexao::conectar();
//        $matricula = $this->getMatricula();
//        $matricula = $obj->matricula;

        $stmt = $con->query("Select * from usuario where matricula ='$matricula'");

        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count >= 1) {
            echo $count;
            return $count;
//            return $stmt->errorInfo();
        } else {
            unset($con);
            return $count;
        }
    }

    public function alterarUsuario($id) {

        require 'conexao.php';

        $con = Conexao::conectar();

        $sql = "UPDATE usuario SET nome_usuario = ? , matricula = ? , sobrenome_usuario = ? ,
               id_cargo = ? , nivel = ?, email = ? , senha = ? , data_cadastro = ? , status_usuario = ?, id_loja = ?  WHERE id_usuario = ?";

        $stmt = $con->prepare($sql);

        $stmt->bindParam(1, $this->getNomeusuario());
        $stmt->bindParam(2, $this->getMatricula());
        $stmt->bindParam(3, $this->getSobrenomeusuario());
        $stmt->bindParam(4, $this->getIdcargo());
        $stmt->bindParam(5, $this->getNivel());
        $stmt->bindParam(6, $this->getEmail());
        $stmt->bindParam(7, $this->getSenha());
        $stmt->bindParam(8, $this->getDatacadastro());
        $stmt->bindParam(9, $this->getStatususuario());
        $stmt->bindParam(10, $this->getIdloja());
        $stmt->bindParam(11, $id);

        $result = $stmt->execute();

        if ($result == false) {
            return $stmt->errorInfo();
        } else {
            unset($con);
            return $result;
        }
    }

     public function alterarSenha() {
   
         require 'conexao.php';

        $con = Conexao::conectar();
         
         
//         $id = 8;
        $senha = "22334444444444444444444444444444";
 
        $stmt = $con->query('UPDATE usuario SET senha = :senha WHERE id = 1');

          $stmt->execute(array(
//          ':id'   => $id,
          ':senha' => $senha
        ));
    
//  echo $stmt->rowCount(); 
//} catch(PDOException $e) {
//  echo 'Error: ' . $e->getMessage();
//}

    }
        
    public function excluirUsuario2() {
        require 'conexao.php';
        $con = Conexao::conectar();
        $id = $this->getIdusuario();
        $stmt = $con->query("DELETE FROM usuario WHERE id_usuario = $id");
        $result = $stmt->execute();

        if ($result == false) {
            return $stmt->errorInfo();
        } else {
            unset($con);
            return $result;
        }
    }
        
    public function recuperaSenha(){
        
        require 'conexao.php';
        $con = Conexao::conectar();
//        $email = $this->getEmail();
        
        $email = $this->email;
        $stmt = $con->query("select * from usuario where email ='$email'");
         
//        $result = $stmt->execute();
        
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count >= 1){
            
         $count = 1;   
         
         return $count;
//         exit();
        } else {
        $count = 0;
        return $count;
               
    }
    
}

   public function dadosUsuario2($email) {

        $con = Conexao::conectar();
        $stmt = $con->query("Select * from usuario where email = '$email'");
        $obj = $stmt->fetchObject();
        $dados = array(
            $obj->id_usuario,
            $obj->matricula,
            $obj->nome_usuario,
            $obj->sobrenome_usuario,
            $obj->id_cargo,
            $obj->nivel,
            $obj->email,
            $obj->senha,
            $obj->data_cadastro,
            $obj->status_usuario,
            $obj->id_loja,
            $obj->id_cargo,
        );
        return $dados;
    }





}
?>

