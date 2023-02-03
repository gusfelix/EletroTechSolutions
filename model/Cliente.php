<?php

class Cliente{
    
    private $idcliente;
    private $nomec;
    private $cpfc;
    private $emailc;
    private $senhac;
    private $celularc;
    private $cep;
    private $endereco;
	private $numero;
	private $complemento;
    private $bairro;
    private $municipio;
    private $estado;
    private $plano;
    private $cartaoc;
	private $titular;
    private $cvv;
    private $validade;

    public function getIdcliente(){
		return $this->idcliente;
	}

	public function setIdcliente($idcliente){
		$this->idcliente = $idcliente;
	}

	public function getNomec(){
		return $this->nomec;
	}

	public function setNomec($nomec){
		$this->nomec = $nomec;
	}

	public function getCpfc(){
		return $this->cpfc;
	}

	public function setCpfc($cpfc){
		$this->cpfc = $cpfc;
	}

	public function getEmailc(){
		return $this->emailc;
	}

	public function setEmailc($emailc){
		$this->emailc = $emailc;
	}

	public function getSenhac(){
		return $this->senhac;
	}

	public function setSenhac($senhac){
		$this->senhac = $senhac;
	}

	public function getCelularc(){
		return $this->celularc;
	}

	public function setCelularc($celularc){
		$this->celularc = $celularc;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getComplemento(){
		return $this->complemento;
	}

	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getMunicipio(){
		return $this->municipio;
	}

	public function setMunicipio($municipio){
		$this->municipio = $municipio;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getPlano(){
		return $this->plano;
	}

	public function setPlano($plano){
		$this->plano = $plano;
	}

	public function getTitular(){
		return $this->titular;
	}

	public function setTitular($titular){
		$this->titular = $titular;
	}

	public function getCartaoc(){
		return $this->cartaoc;
	}

	public function setCartaoc($cartaoc){
		$this->cartaoc = $cartaoc;
	}

	public function getCvv(){
		return $this->cvv;
	}

	public function setCvv($cvv){
		$this->cvv = $cvv;
	}

	public function getValidade(){
		return $this->validade;
	}

	public function setValidade($validade){
		$this->validade = $validade;
	}
}

?>