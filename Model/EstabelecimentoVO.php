<?php
class EstabelecimentoVO{
	private $id_estabelecimento;
	private $id_regiao;
	private $nome_estabelecimento;
	private $numero_estabelecimento;
	private $id_tipo_estabelecimento;
	private $cidade_estabelecimento;
	
	public function getId_estabelecimento() {
		return $this->id_estabelecimento;
	}
	public function setId_estabelecimento($valor) {
		$this->id_estabelecimento = $valor;
	}
	public function getId_regiao() {
		return $this->id_regiao;
	}
	public function setId_regiao($valor) {
		$this->id_regiao = $valor;
	}
	public function getNome_estabelecimento() {
		return $this->nome_estabelecimento;
	}
	public function setNome_estabelecimento($valor) {
		$this->nome_estabelecimento = $valor;
	}
	public function getNumero_estabelecimento() {
		return $this->numero_estabelecimento;
	}
	public function setNumero_estabelecimento($valor) {
		$this->numero_estabelecimento = $valor;
	}
	public function getId_tipo_estabelecimento() {
		return $this->id_tipo_estabelecimento;
	}
	public function setId_tipo_estabelecimento($valor) {
		$this->id_tipo_estabelecimento = $valor;
	}
	public function getCidade_estabelecimento() {
		return $this->cidade_estabelecimento;
	}
	public function setCidade_estabelecimento($valor) {
		$this->cidade_estabelecimento = $valor;
	}
	
	
}