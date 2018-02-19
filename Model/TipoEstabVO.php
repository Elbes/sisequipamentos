<?php
class TipoEstabVO {
	private $id_tipo_estabelecimento;
	private $tipo;
	private $obs;
	
	public function getId_tipo_estabelecimento() {
		return $this->id_tipo_estabelecimento;
	}
	public function setId_tipo_estabelecimento($valor) {
		$this->id_tipo_estabelecimento = $valor;
	}
	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($valor) {
		$this->tipo = $valor;
	}
	public function getObs() {
		return $this->obs;
	}
	public function setObs($valor) {
		$this->obs = $valor;
	}
		
}