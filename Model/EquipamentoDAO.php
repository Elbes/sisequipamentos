<?php
ini_set(error_reporting('1'));
if(!in_array('Conexao', get_declared_classes()) ) {
	require_once('Conexao.class.php');
}
require_once "EquipamentoVO.php";
 
class EquipamentoDAO extends Conexao{
 	public $conex = null;
 	
 	//Construtor
 	public function EquipamentoDAO(){
 		$this->conex = Conexao :: getConnection();
 	}
 	
 	public function inserir($equip){
 		try {
 			$this->conex->beginTransaction();
			$query = $this->conex->prepare("INSERT INTO tb_equipamento (id_equipamento,nome_equipamento,num_patrimonio,num_serie,
					                       fabricante,modelo_equip,marca_equip,executor_contrato,setor_instalacao,responsavel_setor,
					                       telefone_setor,ramal_setor,assistencia_tec,tel_assistencia_tec,recursos,valor_aquisicao,
					                       vencimento_garantia,contrato_manutencao,numero_nota_fiscal,data_aquisicao,manual_tecnico,
					                       tensao_equip,potencia_equip,material_entregue,dhs_cadastro,id_estabelecimento,id_usuario_cadastro)
					                       VALUES (null,:nome_equipamento,:num_patrimonio,:num_serie,:fabricante,:modelo_equip,:marca_equip,
					                       :executor_contrato,:setor_instalacao,:responsavel_setor,:telefone_setor,:ramal_setor,
					                       :assistencia_tec,:tel_assistencia_tec,:recursos,:valor_aquisicao,:vencimento_garantia,
					                       :contrato_manutencao,:numero_nota_fiscal,:data_aquisicao,:manual_tecnico,:tensao_equip,
					                       :potencia_equip,:material_entregue,:dhs_cadastro,:id_estabelecimento,:id_usuario_cadastro)");
			 
			$valores = array(nome_equipamento    =>$equip->getNomeEquipamento(),
							num_patrimonio		 =>$equip->getNumPatrimonio(),
							num_serie			 =>$equip->getNumSerie(),
							fabricante			 =>$equip->getFabricante(),
							modelo_equip		 =>$equip->getModeloEquip(),
							marca_equip			 =>$equip->getMarcaEquip(),
							executor_contrato    =>$equip->getExecutorContrato(),
							setor_instalacao     =>$equip->getSetorInstalacao(),
							responsavel_setor    =>$equip->getResponsavelSetor(),
							telefone_setor       =>$equip->getTelefoneSetor(),
							ramal_setor			 =>$equip->getRamalSetor(),
							assistencia_tec		 =>$equip->getAssistenciaTec(),
							tel_assistencia_tec  =>$equip->getTelAssistenciaTec(),
							recursos			 =>$equip->getRecursos(),
							valor_aquisicao      =>$equip->getValorAquisicao(),
							vencimento_garantia  =>$equip->getVencimentoGarantia(),
							contrato_manutencao  =>$equip->getContratoManutencao(),
							numero_nota_fiscal   =>$equip->getNumeroNotaFiscal(),
							data_aquisicao       =>$equip->getDataAquisicao(),
							manual_tecnico       =>$equip->getManualTecnico(),
							tensao_equip         =>$equip->getTensaoEquip(),
							potencia_equip       =>$equip->getPotenciaEquip(),
							material_entregue    =>$equip->getMaterialEntregue(),
							dhs_cadastro         =>$equip->getDhsCadastro(),
							id_estabelecimento   =>$equip->getIdEstabelecimento(),
							id_usuario_cadastro  =>$equip->getIdUsuarioCadastro());
	
		
	 			$query->execute($valores);
	 			 
	 			$this->conex->commit();
	 			$this->conex = null;
	 			$this->conex = Conexao :: Close();
			} catch (PDOException $ex) {
				echo "Erro: " . $ex->getMessage();
			}
	 	}
	 	
	 	public function update($equip,$id_equip) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$query = $this->conex->prepare("UPDATE tb_equipamento SET nome_equipamento= :nome_equipamento, num_patrimonio= :num_patrimonio,
	 					                       num_serie= :num_serie, fabricante= :fabricante, modelo_equip= :modelo_equip, marca_equip= :marca_equip,
	 					                       executor_contrato= :executor_contrato, setor_instalacao= :setor_instalacao, responsavel_setor= :responsavel_setor,
	 					                       telefone_setor= :telefone_setor, ramal_setor= :ramal_setor,assistencia_tec= :assistencia_tec,
	 					                       tel_assistencia_tec= :tel_assistencia_tec, recursos= :recursos, valor_aquisicao= :valor_aquisicao, 
	 					                       vencimento_garantia= :vencimento_garantia, contrato_manutencao= :contrato_manutencao,
	 					                       numero_nota_fiscal= :numero_nota_fiscal,data_aquisicao= :data_aquisicao, manual_tecnico= :manual_tecnico, tensao_equip= :tensao_equip,
	 					                       potencia_equip= :potencia_equip, material_entregue= :material_entregue, dhs_atualizacao= :dhs_atualizacao
	 					                       WHERE id_equipamento= {$id_equip}");
	 			
	 			$valores = array(nome_equipamento   =>$equip->getNomeEquipamento(),
							num_patrimonio		 	=>$equip->getNumPatrimonio(),
							num_serie			 	=>$equip->getNumSerie(),
							fabricante			 	=>$equip->getFabricante(),
							modelo_equip		 	=>$equip->getModeloEquip(),
							marca_equip			 	=>$equip->getMarcaEquip(),
							executor_contrato    	=>$equip->getExecutorContrato(),
							setor_instalacao     	=>$equip->getSetorInstalacao(),
							responsavel_setor    	=>$equip->getResponsavelSetor(),
							telefone_setor       	=>$equip->getTelefoneSetor(),
							ramal_setor			 	=>$equip->getRamalSetor(),
							assistencia_tec		 	=>$equip->getAssistenciaTec(),
							tel_assistencia_tec  	=>$equip->getTelAssistenciaTec(),
							recursos				=>$equip->getRecursos(),
							valor_aquisicao      	=>$equip->getValorAquisicao(),
							vencimento_garantia  	=>$equip->getVencimentoGarantia(),
							contrato_manutencao  	=>$equip->getContratoManutencao(),
							numero_nota_fiscal   	=>$equip->getNumeroNotaFiscal(),
							data_aquisicao       =>$equip->getDataAquisicao(),
							manual_tecnico      	=>$equip->getManualTecnico(),
							tensao_equip         	=>$equip->getTensaoEquip(),
							potencia_equip       	=>$equip->getPotenciaEquip(),
							material_entregue    	=>$equip->getMaterialEntregue(),
							dhs_atualizacao         =>$equip->getDhsAtualizacao());
	 			 
	 			$query->execute($valores);
	 			$this->conex->commit();
	 			$this->conex = null;
	 			$this->conex = Conexao :: Close();
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function deleteEquip($id_equipamento) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("DELETE FROM tb_equipamento WHERE id_equipamento= {$id_equipamento}");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function listar() {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_equipamento ORDER BY id_equipamento");
	 				
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 			$this->conex = Conexao :: Close();
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function listarEstab($id_estab) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_equipamento where id_estabelecimento={$id_estab}");
	 	
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 			$this->conex = Conexao :: Close();
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function pesquisar($id_equip) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_equipamento WHERE id_equipamento = {$id_equip}");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function updateEstab($objequip,$id_equip) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$query = $this->conex->prepare("UPDATE tb_equipamento SET id_estabelecimento= :id_estabelecimento WHERE id_equipamento= {$id_equip}");
	 			$valores = array(id_estabelecimento => $objequip->getIdEstabelecimento());
	 	
	 			$query->execute($valores);
	 			$this->conex->commit();
	 			$this->conex = null;
	 			$this->conex = Conexao :: Close();
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	public function verificaExistente($num_patrimonio) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_equipamento WHERE num_patrimonio= {$num_patrimonio}");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}

	 	public function relatorioEquipPeriodo($data_inicial, $data_final) {
	 		try {
	 			$this->conex->beginTransaction();
	 			$stmt = $this->conex->prepare("SELECT * FROM tb_equipamento WHERE dhs_cadastro BETWEEN '{$data_inicial}' AND '{$data_final}' ");
	 			$stmt->execute();
	 			$this->conex->commit();
	 			$this->conex = null;
	 			return $stmt;
	 		} catch (PDOException $ex) {
	 			echo "Erro: " . $ex->getMessage();
	 		}
	 	}
	 	
	 	
}