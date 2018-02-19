<?php
ini_set(error_reporting('0'));
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once ("CargoVO.php");

class CargoDAO extends Conexao{
	public $conex = null;

	public function CargoDAO() {
		$this->conex = Conexao :: getConnection();
	}
	
	public function inserir($perfil) {
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_perfil (id_perfil, tipo_perfil, nome_perfil, descricao_perfil)
											 VALUES (null,:tipo_perfil, :nome_perfil, :descricao_perfil)");
			$valores = array(tipo_perfil => $perfil->getTipo_perfil(),
							 nome_perfil => $perfil->getNome_perfil(),
							 descricao_perfil => $perfil->getDescricao_perfil());
			$query->execute($valores);
			$this->conex->commit();

			$this->conex = null;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function atualizar($objperfil, $id_perfil) {
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("UPDATE tb_perfil SET tipo_perfil= :tipo_perfil, nome_perfil= :nome_perfil, descricao_perfil= :descricao_perfil WHERE id_perfil= {$id_perfil}");
			$valores = array(tipo_perfil	   =>$objperfil->getTipo_perfil(),
							 nome_perfil	   =>$objperfil->getNome_perfil(),
							 descricao_perfil  =>$objperfil->getDescricao_perfil());
			$query->execute($valores);
			$this->conex->commit();
			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}

	}

	public function excluir($id_perfil) {
		try {
			$this->conex->beginTransaction();
			$num = $this->conex->exec("DELETE FROM tb_perfil WHERE id_perfil={$id_perfil}");
			$this->conex->commit();
			if ($num >= 1) {
				return $num;
			} else {
				return 0;
			}
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function listar() {
	 		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_perfil ORDER BY nome_perfil");
			
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function pesquisar($id_perfil) {
		try {
				$this->conex->beginTransaction();
				$stmt = $this->conex->prepare("SELECT * FROM tb_perfil WHERE id_perfil = :condicao");
				$valores = array(condicao =>$id_perfil);
				$stmt->execute($valores);
				$this->conex->commit();
				$this->conex = null;
			return $stmt;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
}
?>