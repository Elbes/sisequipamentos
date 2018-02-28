<?php
ini_set(error_reporting('1'));
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once "ManutencaoVO.php";
 
class ManutencaoDAO extends Conexao{
 	public $conex = null;
 	
 	//Construtor
 	public function ManutencaoDAO(){
 		$this->conex = Conexao :: getConnection();
 	}
 	
 	public function inserir($manut){
 		try {
 			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_manutencao (id_manutencao,id_equipamento,servico_solicitado,numero_chamado,local_falha,
					                       acessorios,local_manutencao,data_envio,telefone_manutencao,contrato_manutencao,grau_necessidade,
					                       origem_falha,origem_falha_outro,observacao_manutencao, previsao_entrega, id_usuario_abertura,dhs_abertura, status_manutencao)
					                       VALUES (null,:id_equipamento,:servico_solicitado,:numero_chamado,:local_falha,:acessorios,:local_manutencao,
					                       :data_envio,:telefone_manutencao,:contrato_manutencao,:grau_necessidade,:origem_falha,
					                       :origem_falha_outro,:observacao_manutencao,:previsao_entrega,:id_usuario_abertura,:dhs_abertura, :status_manutencao)");

			$valores = array(id_equipamento		   =>$manut->getIdEquipamento(),
					        servico_solicitado    =>$manut->getServicoSolicitado(),
							numero_chamado		   =>$manut->getNumeroChamado(),
							local_falha			   =>$manut->getLocalFalha(),
							acessorios			   =>$manut->getAcessorios(),
							local_manutencao	   =>$manut->getLocalManutencao(),
							data_envio			   =>$manut->getDataEnvio(),
							telefone_manutencao    =>$manut->getTelefoneManutencao(),
							contrato_manutencao    =>$manut->getContratoManutencao(),
							grau_necessidade       =>$manut->getGrauNecessidade(),
							origem_falha           =>$manut->getOrigemFalha(),
							origem_falha_outro     =>$manut->getOrigemFalhaOutro(),
					        observacao_manutencao  =>$manut->getObservacaoManutencao(),
					        previsao_entrega       =>$manut->getPrevisaoEntrega(),
					        id_usuario_abertura    =>$manut->getIdUsuarioAbertura(),
					        dhs_abertura           =>$manut->getDhsAbertura(),
					        status_manutencao      =>$manut->getStatusManutencao());
	
	 			$query->execute($valores);
	 			$this->conex->commit();
	 			$this->conex = null;
	 			$this->conex = Conexao :: Close();
			} catch (PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
			}
	 	}
	 	
	 	public function update($manut,$id_manutencao) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$query = $this->conex->prepare("UPDATE tb_manutencao SET servico_solicitado= :servico_solicitado,numero_chamado= :numero_chamado,
	 					                       local_falha= :local_falha,acessorios= :acessorios,local_manutencao= :local_manutencao,data_envio= :data_envio,
	 					                       telefone_manutencao= :telefone_manutencao,contrato_manutencao= :contrato_manutencao,grau_necessidade= :grau_necessidade,
					                           origem_falha= :origem_falha,origem_falha_outro= :origem_falha_outro,observacao_manutencao= :observacao_manutencao,
	 					                       previsao_entrega=:previsao_entrega WHERE id_manutencao= {$id_manutencao}");
	 		 	
	 			$valores = array(
	 					    servico_solicitado    =>$manut->getServicoSolicitado(),
							numero_chamado		   =>$manut->getNumeroChamado(),
							local_falha			   =>$manut->getLocalFalha(),
							acessorios			   =>$manut->getAcessorios(),
							local_manutencao	   =>$manut->getLocalManutencao(),
							data_envio			   =>$manut->getDataEnvio(),
							telefone_manutencao    =>$manut->getTelefoneManutencao(),
							contrato_manutencao    =>$manut->getContratoManutencao(),
							grau_necessidade       =>$manut->getGrauNecessidade(),
							origem_falha           =>$manut->getOrigemFalha(),
							origem_falha_outro     =>$manut->getOrigemFalhaOutro(),
					        observacao_manutencao  =>$manut->getObservacaoManutencao(),
	 					    previsao_entrega       =>$manut->getPrevisaoEntrega());
	 	
	 			$query->execute($valores);
	 			$this->conex->commit();
	 			$this->conex = null;
	 			$this->conex = Conexao :: Close();
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function fecharManutencao($manut,$id_manutencao) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$query = $this->conex->prepare("UPDATE tb_manutencao SET falha_relatada= :falha_relatada,servico_realizado= :servico_realizado,
	 					data_entrega= :data_entrega,recebido_por= :recebido_por,pendencia= :pendencia,descricao_pendencia= :descricao_pendencia,
	 					troca_peca= :troca_peca,peca_trocada= :peca_trocada,valor_total= :valor_total,venc_garantia_servico= :venc_garantia_servico,
	 					observacao_fechamento= :observacao_fechamento,id_usuario_fechamento= :id_usuario_fechamento,dhs_fechamento= :dhs_fechamento,
	 					status_manutencao= :status_manutencao WHERE id_manutencao= {$id_manutencao}");
	 			
            
	 			
	 	
	 			$valores = array(
	 					falha_relatada         =>$manut->getFalhaRelatada(),
	 					servico_realizado	   =>$manut->getServicoRealizado(),
	 					data_entrega		   =>$manut->getDataEntrega(),
	 					recebido_por		   =>$manut->getRecebidoPor(),
	 					pendencia			   =>$manut->getPendencia(),
	 					descricao_pendencia    =>$manut->getDescricaoPendencia(),
	 					troca_peca		       =>$manut->getTrocaPeca(),
	 					peca_trocada		   =>$manut->getPecaTrocada(),
	 					valor_total		       =>$manut->getValorTotal(),
	 					venc_garantia_servico  =>$manut->getVencGarantiaServico(),
	 					observacao_fechamento  =>$manut->getObservacaoFechamento(),
	 					id_usuario_fechamento  =>$manut->getIdUsuarioFechamento(),
	 					dhs_fechamento         =>$manut->getDhsFechamento(),
	 					status_manutencao      =>$manut->getStatusManutencao());
	 			
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
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao");
	 				
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 			$this->conex = Conexao :: Close();
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function listarStatusEquip($status, $id_equipamento) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE id_equipamento= {$id_equipamento} AND status_manutencao like '%{$status}%' ");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 			} catch (PDOException $ex) {
	 				echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function listarStatus($status) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE status_manutencao like '%{$status}%' ");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function pesquisar($id_manutencao) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE id_manutencao = {$id_manutencao}");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function deleteManutEquip($id_equipamento) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("DELETE FROM tb_manutencao WHERE id_equipamento= {$id_equipamento}");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function relatorioManutPeriodo($data_inicial, $data_final) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE dhs_abertura BETWEEN '{$data_inicial}' AND '{$data_final}'");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function relatorioManutPeriodoStatus($data_inicial, $data_final, $status) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE status_manutencao like '%{$status}%' AND dhs_abertura BETWEEN '{$data_inicial}' AND '{$data_final}' ");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function relatorioManutEquip($id_equipamento, $status) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE id_equipamento = {$id_equipamento} AND status_manutencao like '%{$status}%'");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function relatorioManutEquipData($id_equipamento, $data_inicial, $data_final, $status) {
		 	try {
		 		$this->conex->beginTransaction();
		 		$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE id_equipamento = {$id_equipamento} AND status_manutencao like '%{$status}%' AND dhs_abertura BETWEEN '{$data_inicial}' AND '{$data_final}'");
		 		$stmt->execute();
		 		$this->conex->commit();
		 		$this->conex = null;
		 		return $stmt;
		 	} catch (PDOException $ex) {
		 		echo "Erro: " . $ex->getMessage();
		 	}
		 }
		 
		 public function relatorioSemStatus($id_equipamento, $data_inicial, $data_final) {
		 	try {
		 		$this->conex->beginTransaction();
		 		$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE id_equipamento = {$id_equipamento} AND dhs_abertura BETWEEN '{$data_inicial}' AND '{$data_final}'");
		 		$stmt->execute();
		 		$this->conex->commit();
		 		$this->conex = null;
		 		return $stmt;
		 	} catch (PDOException $ex) {
		 		echo "Erro: " . $ex->getMessage();
		 	}
		 }
		 
		 public function relatorioManutEquipSemData($id_equipamento) {
		 	try {
		 		$this->conex->beginTransaction();
		 		$stmt = $this->conex->prepare("SELECT * FROM tb_manutencao WHERE id_equipamento = {$id_equipamento} ");
		 		$stmt->execute();
		 		$this->conex->commit();
		 		$this->conex = null;
		 		return $stmt;
		 	} catch (PDOException $ex) {
		 		echo "Erro: " . $ex->getMessage();
		 	}
		 }
	
}