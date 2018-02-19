<?php
class Perfil {
	
	private $id_cargo;
	private $nome_cargo;
	private $status_cargo;
	private $descricao_perfil;
	
	public function getIdCargo() {
		return $this->id_cargo;
	}
	
	public function setIdCargo($id_cargo) {
		$this->id_cargo = $id_cargo;
	}
   
   public function getNomecargo() {
        return $this->nome_cargo;
    }

    public function setNomecargo($nome_cargo) {
        $this->nome_cargo = $nome_cargo;
    }

    public function getIdcargo() {
        return $this->id_cargo;
    }

    public function setIdcargo($id_cargo) {
        $this->id_cargo = $id_cargo;
    }
}
?>