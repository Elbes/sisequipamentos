<?php
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once ("TipoEstabVO.php");
 
class TipoEstabDAO extends Conexao{
	public $conex = null;
	
	public function TipoEstabDAO(){
		$this->conex = Conexao :: getConnection();
	}
	
	public function inserir($tipo){
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_tipo_estabelecimento (id_tipo_estabelecimento, tipo, obs_tipo)
					                        VALUES (null, :tipo, :obs_tipo)");
			$valores = array(tipo     => $tipo->getTipo(),
					         obs_tipo      => $tipo->getObs());
			
 			$query->execute($valores);
			$this->conex->commit();

			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
 	}
 	
	public function listar() {
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_tipo_estabelecimento");
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function pesquisar($id_tipo_estab) {
		try {
				$this->conex->beginTransaction();
				$stmt = $this->conex->prepare("SELECT * FROM tb_tipo_estabelecimento  WHERE id_tipo_estabelecimento = {$id_tipo_estab}");
				//$valores = array(condicao => $id_tipo_estab);
				$stmt->execute();
				$this->conex->commit();
				$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function pesqTipo($tipo) {
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_tipo_estabelecimento  WHERE tipo = {$tipo}");
			//$valores = array(condicao => $tipo);
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function update($tipo, $id_tipo_estabelecimento){
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("UPDATE tb_tipo_estabelecimento SET tipo= :tipo, obs_tipo= :obs_tipo
					                        WHERE id_tipo_estabelecimento= {$id_tipo_estabelecimento}");
			$valores = array(tipo     => $tipo->getTipo(),
							obs_tipo      => $tipo->getObs());
				
			$query->execute($valores);
			$this->conex->commit();
	
			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
