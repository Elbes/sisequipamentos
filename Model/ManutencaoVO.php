<?php
class ManutencaoVO {
	private $id_manutencao;
	private $servico_solicitado;
	private $numero_chamado;
	private $local_falha;
	private $acessorios;
	private $local_manutencao;
	private $data_envio;
	private $telefone_manutencao;
	private $contrato_manutencao;
	private $grau_necessidade;
	private $origem_falha;
	private $origem_falha_outro;
	private $observacao_manutencao;
	private $previsao_entrega;
	private $recebido_por;
    private $tipo_manutencao;
	private $responsavel_manutencao;
	private $falha_relatada;
	private $data_entrega;
	private $servico_realizado;
	private $pendencia;
	private $descricao_pendencia;
	private $troca_peca;
	private $peca_trocada;
	private $valor_total;
	private $observacao_fechamento;
	private $venc_garantia_servico;
	private $id_usuario_abertura;
	private $id_usuario_fechamento;
	private $dhs_abertura;
	private $dhs_fechamento;
	private $status_manutencao;
	private $id_equipamento;
	
	public function getIdManutencao() {
		return $this->id_manutencao;
	}
	public function setIdManutencao($valor) {
		$this->id_manutencao = $valor;
	}
	public function getServicoSolicitado() {
		return $this->servico_solicitado;
	}
	public function setServicoSolicitado($valor) {
		$this->servico_solicitado = $valor;
	}
	public function getNumeroChamado() {
		return $this->numero_chamado;
	}
	public function setNumeroChamado($valor) {
		$this->numero_chamado = $valor;
	}
	public function getLocalFalha() {
		return $this->local_falha;
	}
	public function setLocalFalha($valor) {
		$this->local_falha = $valor;
	}
	public function getAcessorios() {
		return $this->acessorios;
	}
	public function setAcessorios($valor) {
		$this->acessorios = $valor;
	}
	public function getLocalManutencao() {
		return $this->local_manutencao;
	}
	public function setLocalManutencao($valor) {
		$this->local_manutencao = $valor;
	}
	public function getDataEnvio() {
		return $this->data_envio;
	}
	public function setDataEnvio($valor) {
		$this->data_envio = $valor;
	}
	public function getTelefoneManutencao() {
		return $this->telefone_manutencao;
	}
	public function setTelefoneManutencao($valor) {
		$this->telefone_manutencao = $valor;
	}
	public function getContratoManutencao() {
		return $this->contrato_manutencao;
	}
	public function setContratoManutencao($valor) {
		$this->contrato_manutencao = $valor;
	}
	public function getGrauNecessidade() {
		return $this->grau_necessidade;
	}
	public function setGrauNecessidade($valor) {
		$this->grau_necessidade = $valor;
	}
	public function getOrigemFalha() {
		return $this->origem_falha;
	}
	public function setOrigemFalha($valor) {
		$this->origem_falha = $valor;
	}
	public function getOrigemFalhaOutro() {
		return $this->origem_falha_outro;
	}
	public function setOrigemFalhaOutro($valor) {
		$this->origem_falha_outro = $valor;
	}
	public function getObservacaoManutencao() {
		return $this->observacao_manutencao;
	}
	public function setObservacaoManutencao($valor) {
		$this->observacao_manutencao = $valor;
	}
	public function getPrevisaoEntrega() {
		return $this->previsao_entrega;
	}
	public function setPrevisaoEntrega($valor) {
		$this->previsao_entrega = $valor;
	}
	public function getTipoManutencao() {
		return $this->tipo_manutencao;
	}
	public function setTipoManutencao($valor) {
		$this->tipo_manutencao = $valor;
	}
	public function getResponsavelManutencao() {
		return $this->responsavel_manutencao;
	}
	public function setResponsavelManutencao($valor) {
		$this->responsavel_manutencao = $valor;
	}
	public function getFalhaRelatada() {
		return $this->falha_relatada;
	}
	public function setFalhaRelatada($valor) {
		$this->falha_relatada = $valor;
	}
	public function getServicoRealizado() {
		return $this->servico_realizado;
	}
	public function setServicoRealizado($valor) {
		$this->servico_realizado = $valor;
	}
	public function getPendencia() {
		return $this->pendencia;
	}
	public function setPendencia($valor) {
		$this->pendencia = $valor;
	}
	public function getTrocaPeca() {
		return $this->troca_peca;
	}
	public function setTrocaPeca($valor) {
		$this->troca_peca = $valor;
	}
	public function getValorTotal() {
		return $this->valor_total;
	}
	public function setValorTotal($valor) {
		$this->valor_total = $valor;
	}
	public function getVencGarantiaServico() {
		return $this->venc_garantia_servico;
	}
	public function setVencGarantiaServico($valor) {
		$this->venc_garantia_servico = $valor;
	}
	public function getIdUsuarioAbertura() {
		return $this->id_usuario_abertura;
	}
	public function setIdUsuarioAbertura($valor) {
		$this->id_usuario_abertura = $valor;
	}
	public function getIdUsuarioFechamento() {
		return $this->id_usuario_fechamento;
	}
	public function setIdUsuarioFechamneto($valor) {
		$this->id_usuario_fechamento = $valor;
	}
	public function getDhsAbertura() {
		return $this->dhs_abertura;
	}
	public function setDhsAbertura($valor) {
		$this->dhs_abertura = $valor;
	}
	public function getDhsFechamento() {
		return $this->dhs_fechamento;
	}
	public function setDhsFechamento($valor) {
		$this->dhs_fechamento = $valor;
	}
	public function getStatusManutencao() {
		return $this->status_manutencao;
	}
	public function setStatusManutencao($valor) {
		$this->status_manutencao = $valor;
	}
	public function getIdEquipamento() {
		return $this->id_equipamento;
	}
	public function setIdEquipamento($valor) {
		$this->id_equipamento = $valor;
	}
	public function getDataEntrega() {
		return $this->data_entrega;
	}
	public function setDataEntrega($valor) {
		$this->data_entrega = $valor;
	}
	public function getRecebidoPor() {
		return $this->recebido_por;
	}
	public function setRecebidoPor($valor) {
		$this->recebido_por = $valor;
	}
	public function getDescricaoPendencia() {
		return $this->descricao_pendencia;
	}
	public function setDescricaoPendencia($valor) {
		$this->descricao_pendencia = $valor;
	}
	public function getPecaTrocada() {
		return $this->peca_trocada;
	}
	public function setPecaTrocada($valor) {
		$this->peca_trocada = $valor;
	}
	public function getObservacaoFechamento() {
		return $this->observacao_fechamento;
	}
	public function setObservacaoFechamento($valor) {
		$this->observacao_fechamento = $valor;
	}
	

}

