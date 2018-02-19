<?php
class Regiao{
	private $id_regiao;
	private $numero_regiao;
	private $nome_regiao;
	private $sigla_regiao;
	private $descricao;
	
	public function getId_regiao() {
		return $this->id_regiao;
	}
	
	public function getNumero_regiao() {
		return $this->numero_regiao;
	}

	public function getNome_regiao() {
		return $this->nome_regiao;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function getSigla_regiao() {
		return $this->sigla_regiao;
	}

	public function setId_regiao($valor) {
		$this->id_regiao = $valor;
	}
	
	public function setNumero_regiao($valor) {
		$this->numero_regiao = $valor;
	}

	public function setNome_regiao($valor) {
		$this->nome_regiao = $valor;
	}

	public function setDescricao($valor) {
		$this->descricao = $valor;
	}

	public function setSigla_regiao($valor) {
		$this->sigla_regiao = $valor;
	}

	
}