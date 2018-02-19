<?php
ini_set(error_reporting('0'));
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once ("UsuarioVO.php");
 
class UsuarioDAO extends Conexao{
 	public $conex = null;
 	
 	//Construtor
 	public function UsuarioDAO(){
 		$this->conex = Conexao :: getConnection();
 	}
 	
 	public function inserir($usuario){
 		try {
 			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_usuario (id_usuario, matricula, nome_usuario, sobrenome_usuario, email, senha,
					                        status_usuario, data_cadastro, id_perfil, id_estabelecimento) VALUES (null, :matricula, :nome_usuario,
					                        :sobrenome_usuario, :email, :senha, :status_usuario, :data_cadastro, :id_perfil, :id_estabelecimento)");
			
			$valores = array(matricula 	           => $usuario->getMatricula(),
 							 nome_usuario 	   	   => $usuario->getNome_usuario(),
 							 sobrenome_usuario 	   => $usuario->getSobrenome_usuario(),
 							 email		   		   => $usuario->getEmail(),
 							 senha		  	       => $usuario->getSenha(),
 							 status_usuario		   => $usuario->getStatus_usuario(),
					         data_cadastro	       => $usuario->getData_cadastro(),
							 id_perfil  	       => $usuario->getId_perfil(),
					         id_estabelecimento    => $usuario->getId_estabelecimento());
			
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
			$stmt = $this->conex->prepare("SELECT * FROM tb_usuario ORDER BY id_usuario DESC");
			
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function listarPag($pagina,$itens_por_pagina) {
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_usuario LIMIT {$pagina}, {$itens_por_pagina}");
				
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

 	
	
 	public function pesquisarPorMatricula($matricula, $dt_nascimento, $email){
 		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_usuario WHERE matricula = :condicao AND dt_nascimento = :condicao2 AND email = :condicao3");
			$valores = array(condicao =>$matricula, condicao2 =>$dt_nascimento, condicao3 =>$email);
			$stmt->execute($valores);
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
		
	}
	
	public function atualizar($objusuario,$id_usuario) {
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("UPDATE tb_usuario SET matricula= :matricula, nome_usuario= :nome_usuario, sobrenome_usuario= :sobrenome_usuario,
					                       email= :email, status_usuario= :status_usuario, id_perfil= :id_perfil WHERE id_usuario= {$id_usuario}");
			
			$valores = array(matricula 	           => $objusuario->getMatricula(),
 							 nome_usuario 	   	   => $objusuario->getNome_usuario(),
 							 sobrenome_usuario 	   => $objusuario->getSobrenome_usuario(),
 							 email		   		   => $objusuario->getEmail(),
 							 status_usuario		   => $objusuario->getStatus_usuario(),
					         id_perfil             => $objusuario->getId_perfil());
			
			$query->execute($valores);
			
			$this->conex->commit();
			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
	public function updateEstab($objusuario,$id_usuario) {
		try {
			$this->conex->beginTransaction();
			$query = $this->conex->prepare("UPDATE tb_usuario SET id_estabelecimento= :id_estabelecimento WHERE id_usuario= {$id_usuario}");
			$valores = array(id_estabelecimento => $objusuario->getId_estabelecimento());
	
			$query->execute($valores);
			$this->conex->commit();
			$this->conex = null;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}

	public function deletar($id_usuario) {
		try {
			$this->conex->beginTransaction();
			$num = $this->conex->exec("DELETE FROM tb_usuario WHERE id_usuario={$id_usuario}");
			$this->conex->commit();
			if ($num >= 1) {
				return $num;
			} else {
				return 0;
			}
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}


	
 	public function fazerLogin($matricula){
 		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_usuario WHERE matricula = '{$matricula}'");
			//$valores = array(matricula =>$matricula);
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
 			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	}
	
 	public function verificaExistente($matricula){
 		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_usuario WHERE matricula = :condicao");
			$valores = array(condicao =>$matricula);
			$stmt->execute($valores);
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
		
	}
	
	public function pesqId($id_usuario){
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("SELECT * FROM tb_usuario WHERE id_usuario = {$id_usuario}");
			//$valores = array(condicao =>$id_usuario);
			$stmt->execute();
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	
	}
	
	public function excluirUs($id_usuario){
		try {
			$this->conex->beginTransaction();
			$stmt = $this->conex->prepare("DELETE FROM tb_usuario WHERE id_usuario = :condicao");
			$valores = array(condicao =>$id_usuario);
			$stmt->execute($valores);
			$this->conex->commit();
			$this->conex = null;
			return $stmt;
			$this->conex = Conexao :: Close();
		} catch (PDOException $ex) {
			echo "Erro: " . $ex->getMessage();
		}
	
	}
	
 }
 ?>