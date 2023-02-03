<?php

class Agendamento{

    private $idagenda;
    private $idfunc;
    private $idcliente;
    private $dia;
    private $hora;
	private $preco;
    private $descricao;
    private $form;
    private $status;

    public function getIdagenda(){
		return $this->idagenda;
	}

	public function setIdagenda($idagenda){
		$this->idagenda = $idagenda;
	}

	public function getIdfunc(){
		return $this->idfunc;
	}

	public function setIdfunc($idfunc){
		$this->idfunc = $idfunc;
	}

	public function getIdcliente(){
		return $this->idcliente;
	}

	public function setIdcliente($idcliente){
		$this->idcliente = $idcliente;
	}

	public function getDia(){
		return $this->dia;
	}

	public function setDia($dia){
		$this->dia = $dia;
	}

	public function getHora(){
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getForm(){
		return $this->form;
	}

	public function setForm($form){
		$this->form = $form;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

}

?>