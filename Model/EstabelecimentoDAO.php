<?php
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once ("EstabelecimentoVO.php");
 
class EstabelecimentoDAO extends Conexao{
	public $conex = null;
	
	public function EstabelecimentoDAO(){
		$this->conex = Conexao :: getConnection();
	}
	
	public function inserir($estab){
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_estabelecimento (id_estabelecimento, nome_estabelecimento, numero_estabelecimento,
					                        cidade_estabelecimento, id_tipo_estabelecimento, id_regiao) VALUES (null, :nome_estabelecimento, 
					                        :numero_estabelecimento, :cidade_estabelecimento, :id_tipo_estabelecimento, :id_regiao)");
			$valores = array(nome_estabelecimento       => $estab->getNome_estabelecimento(),
					         numero_estabelecimento     => $estab->getNumero_estabelecimento(),
					         cidade_estabelecimento     => $estab->getCidade_estabelecimento(),
					         id_tipo_estabelecimento    => $estab->getId_tipo_estabelecimento(),
					         id_regiao 	                => $estab ->getId_regiao());
		
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
			$stmt = $this->conex->prepare("SELECT * FROM tb_estabelecimento ORDER BY nome_estabelecimento");
			
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function pesquisar($id_estab) {
		try {
				$this->conex->beginTransaction();
				$stmt = $this->conex->prepare("SELECT * FROM tb_estabelecimento WHERE id_estabelecimento = {$id_estab}");
				//$valores = array(condicao => $id_estab);
				$stmt->execute();
				$this->conex->commit();
				$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function pesqReg($id_regiao) {
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_estabelecimento  WHERE id_regiao = {$id_regiao}");
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	
	public function pesquisarEstab($nome_estabelecimento, $numero_estabelecimento) {
		try {
				$this->conex->beginTransaction();
				$stmt = $this->conex->prepare("SELECT * FROM tb_estabelecimento WHERE nome_estabelecimento = {$nome_estabelecimento} OR numero_estabelecimento = {$numero_estabelecimento}");
				//$valores = array(condicao1 => $nome_estabelecimento, condicao2 => $numero_estabelecimento);
				$stmt->execute();
				$this->conex->commit();
				$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function pesquisarIdRegiao($id_regiao) {
		try {
				$this->conex->beginTransaction();
				$stmt = $this->conex->prepare("SELECT * FROM tb_estabelecimento WHERE id_regiao = {$id_regiao}");
				//$valores = array(condicao => $id_regiao);
				$stmt->execute();
				$this->conex->commit();
				$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function update($estab, $id_estab){
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("UPDATE tb_estabelecimento SET nome_estabelecimento= :nome_estabelecimento,
					                        cidade_estabelecimento= :cidade_estabelecimento, numero_estabelecimento= :numero_estabelecimento,
					                        id_tipo_estabelecimento= :id_tipo_estabelecimento, id_regiao= :id_regiao WHERE id_estabelecimento= {$id_estab}");
			$valores = array(nome_estabelecimento       => $estab->getNome_estabelecimento(),
					         cidade_estabelecimento     => $estab->getCidade_estabelecimento(),
							 numero_estabelecimento     => $estab->getNumero_estabelecimento(),
							 id_tipo_estabelecimento    => $estab->getId_tipo_estabelecimento(),
					         id_regiao 	       			=> $estab ->getId_regiao());
			$query->execute($valores);
			$this->conex->commit();
	
			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
}
