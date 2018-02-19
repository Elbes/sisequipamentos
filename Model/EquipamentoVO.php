<?php
class EquipamentoVO {
	private $id_equipamento;
	private $nome_equipamento;
	private $num_patrimonio;
	private $num_serie;
	private $fabricante;
	private $modelo_equip;
	private $marca_equip;
	private $executor_contrato;
	private $setor_instalacao;
	private $responsavel_setor;
	private $telefone_setor;
	private $ramal_setor;
	private $assistencia_tec;
	private $tel_assistencia_tec;
	private $recursos;
	private $valor_aquisicao;
	private $vencimento_garantia;
	private $contrato_manutencao;
	private $numero_nota_fiscal;
	private $data_aquisicao;
	private $manual_tecnico;
	private $tensao_equip;
	private $potencia_equip;
	private $material_entregue;
	private $dhs_cadastro;
	private $id_estabelecimento;
	private $id_usuario_cadastro;
	private $dhs_atualizacao;
	
	
	public function getIdEquipamento() {
		return $this->id_equipamento;
	}
	public function setIdEquipamento($valor) {
		$this->id_equipamento = $valor;
	}
	
	public function getNomeEquipamento() {
		return $this->nome_equipamento;
	}
	public function setNomeEquipamento($valor) {
		$this->nome_equipamento = $valor;
	}
	public function getNumPatrimonio() {
		return $this->num_patrimonio;
	}
	public function setNumPatrimonio($valor) {
		$this->num_patrimonio = $valor;
	}
	public function getNumSerie() {
		return $this->num_serie;
	}
	public function setNumSerie($valor) {
		$this->num_serie = $valor;
	}
	public function getFabricante() {
		return $this->fabricante;
	}
	public function setFabricante($valor) {
		$this->fabricante = $valor;
	}
	public function getModeloEquip() {
		return $this->modelo_equip;
	}
	public function setModeloEquip($valor) {
		$this->modelo_equip = $valor;
	}
	public function getMarcaEquip() {
		return $this->marca_equip;
	}
	public function setMarcaEquip($valor) {
		$this->marca_equip = $valor;
	}
	public function getExecutorContrato() {
		return $this->executor_contrato;
	}
	public function setExecutorContrato($valor) {
		$this->executor_contrato = $valor;
	}
	public function getSetorInstalacao() {
		return $this->setor_instalacao;
	}
	public function setSetorInstalacao($valor) {
		$this->setor_instalacao = $valor;
	}
	public function getResponsavelSetor() {
		return $this->responsavel_setor;
	}
	public function setResponsavelSetor($valor) {
		$this->responsavel_setor = $valor;
	}
	public function getTelefoneSetor() {
		return $this->telefone_setor;
	}
	public function setTelefoneSetor($valor) {
		$this->telefone_setor = $valor;
	}
	public function getRamalSetor() {
		return $this->ramal_setor;
	}
	public function setRamalSetor($valor) {
		$this->ramal_setor = $valor;
	}
	public function getAssistenciaTec() {
		return $this->assistencia_tec;
	}
	public function setAssistenciaTec($valor) {
		$this->assistencia_tec = $valor;
	}
	public function getTelAssistenciaTec() {
		return $this->tel_assistencia_tec;
	}
	public function setTelAssistenciaTec($valor) {
		$this->tel_assistencia_tec = $valor;
	}
	public function getRecursos() {
		return $this->recursos;
	}
	public function setRecursos($valor) {
		$this->recursos = $valor;
	}
	public function getValorAquisicao() {
		return $this->valor_aquisicao;
	}
	public function setValorAquisicao($valor) {
		$this->valor_aquisicao = $valor;
	}
	public function getVencimentoGarantia() {
		return $this->vencimento_garantia;
	}
	public function setVencimentoGarantia($valor) {
		$this->vencimento_garantia = $valor;
	}
	public function getContratoManutencao() {
		return $this->contrato_manutencao;
	}
	public function setContratoManutencao($valor) {
		$this->contrato_manutencao = $valor;
	}
	public function getNumeroNotaFiscal() {
		return $this->numero_nota_fiscal;
	}
	public function setNumeroNotaFiscal($valor) {
		$this->numero_nota_fiscal = $valor;
	}
	public function getDataAquisicao() {
		return $this->data_aquiicao;
	}
	public function setDataAquisicao($valor) {
		$this->data_aquisicao = $valor;
	}
	public function getManualTecnico() {
		return $this->manual_tecnico;
	}
	public function setManualTecnico($valor) {
		$this->manual_tecnico = $valor;
	}
	public function getTensaoEquip() {
		return $this->tensao_equip;
	}
	public function setTensaoEquip($valor) {
		$this->tensao_equip = $valor;
	}
	public function getPotenciaEquip() {
		return $this->potencia_equip;
	}
	public function setPotenciaEquip($valor) {
		$this->potencia_equip = $valor;
	}
	public function getMaterialEntregue() {
		return $this->material_entregue;
	}
	public function setMaterialEntregue($valor) {
		$this->material_entregue = $valor;
	}
	public function getDhsCadastro() {
		return $this->dhs_cadastro;
	}
	public function setDhsCadastro($valor) {
		$this->dhs_cadastro = $valor;
	}
	public function getIdEstabelecimento() {
		return $this->id_estabelecimento;
	}
	public function setIdEstabelecimento($valor) {
		$this->id_estabelecimento = $valor;
	}
	public function getIdUsuarioCadastro() {
		return $this->id_usuario_cadastro;
	}
	public function setIdUsuarioCadastro($valor) {
		$this->id_usuario_cadastro = $valor;
	}
	public function getDhsAtualizacao() {
		return $this->dhs_atualizacao;
	}
	public function setDhsAtualizacao($valor) {
		$this->dhs_atualizacao = $valor;
	}
	
	
}