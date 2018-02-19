<?php
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once ("RegiaoVO.php");
 
class RegiaoDAO extends Conexao{
	public $conex = null;
	
	public function RegiaoDAO(){
		$this->conex = Conexao :: getConnection();
	}
	
	public function inserir($regiao){
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_regiao (id_regiao, numero_regiao, nome_regiao, sigla_regiao, descricao_regiao) VALUES
					                       (null, :numero_regiao, :nome_regiao, :sigla_regiao, :descricao_regiao)");
			$valores = array(numero_regiao 	   => $regiao->getNumero_regiao(),
					         nome_regiao       => $regiao->getNome_regiao(),
					         sigla_regiao      => $regiao->getSigla_regiao(),
 							 descricao_regiao  => $regiao->getDescricao());
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
			$stmt = $this->conex->prepare("SELECT * FROM tb_regiao ORDER BY nome_regiao");
			
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function pesquisar($id_regiao) {
		try {
				$this->conex->beginTransaction();
				$stmt = $this->conex->prepare("SELECT * FROM tb_regiao WHERE id_regiao = {$id_regiao}");
				//$valores = array(condicao => $id_regiao);
				$stmt->execute();
				$this->conex->commit();
				$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	
	public function pesquisarRegi($numero_regiao, $nome_regiao, $sigla) {
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_regiao WHERE numero_regiao = :condicao1 OR
					                       nome_regiao = :condicao2 OR sigla= :condicao3");
			$valores = array(condicao1 => $numero_regiao, condicao2 => $nome_regiao, condicao3 => $sigla);
			$stmt->execute($valores);
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function atualizar($regiao,$id_regiao) {
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("UPDATE tb_regiao SET numero_regiao= :numero_regiao, nome_regiao= :nome_regiao,
					                       sigla_regiao= :sigla_regiao, descricao_regiao= :descricao_regiao WHERE id_regiao= {$id_regiao}");
				
			$valores = array(numero_regiao 	   => $regiao->getNumero_regiao(),
					         nome_regiao       => $regiao->getNome_regiao(),
					         sigla_regiao      => $regiao->getSigla_regiao(),
 							 descricao_regiao  => $regiao->getDescricao());
				
			$query->execute($valores);
				
			$this->conex->commit();
			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
}
