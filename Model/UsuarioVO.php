<?php
/**
 * Classe que cont�m os atributos do usu�rio
 * @author Elbes
 *
 */
class Usuario {
	
    private $id_usuario;
    private $matricula;
    private $nome_usuario;
    private $sobrenome_usuario;
    private $email;
    private $senha;
    private $data_cadastro;
    private $status_usuario;
    private $id_estabelecimento;
    private $id_perfil;

    
    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($valor) {
        $this->id_usuario = $valor;
    }

    public function getNome_usuario() {
        return $this->nome_usuario;
    }

    public function setNome_usuario($valor) {
        $this->nome_usuario = $valor;
    }

    public function getSobrenome_usuario() {
        return $this->sobrenome_usuario;
    }

    public function setSobrenome_usuario($valor) {
        $this->sobrenome_usuario = $valor;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($valor) {
        $this->matricula = $valor;
    }

    public function getId_perfil() {
        return $this->id_perfil;
    }

    public function setId_perfil($valor) {
        $this->id_perfil = $valor;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($valor) {
        $this->email = $valor;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($valor) {
        $this->senha = $valor;
    }

    public function getData_cadastro() {
        return $this->data_cadastro;
    }

    public function setData_cadastro($valor) {
        $this->data_cadastro = $valor;
    }

    public function getStatus_usuario() {
        return $this->status_usuario;
    }

    public function setStatus_usuario($valor) {
        $this->status_usuario = $valor;
    }
    
    public function getId_estabelecimento() {
    	return $this->id_estabelecimento;
    }
    
    public function setId_estabelecimento($valor) {
    	$this->id_estabelecimento = $valor;
    }
	
}

?>