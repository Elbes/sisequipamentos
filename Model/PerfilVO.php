<?php
class Perfil {
	
	private $id_perfil;
	private $tipo_perfil;
	private $nome_perfil;
	private $descricao_perfil;
	
	public function getId_perfil() {
		return $this->id_perfil;
	}

	public function getTipo_perfil() {
		return $this->tipo_perfil;
	}

	public function getNome_perfil() {
		return $this->nome_perfil;
	}

	public function getDescricao_perfil() {
		return $this->descricao_perfil;
	}

	public function setId_perfil($valor) {
		$this->id_perfil = $valor;
	}

	public function setTipo_perfil($valor) {
		$this->tipo_perfil = $valor;
	}

	public function setNome_perfil($valor) {
		$this->nome_perfil = $valor;
	}

	public function setDescricao_perfil($valor) {
		$this->descricao_perfil = $valor;
	}

}
?>