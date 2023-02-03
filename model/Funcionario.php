<?php

class Funcionario{
    
    private $idfun;
    private $nomef;
    private $senhaf;
    private $emailf;


    function getIdfun(){
		return $this->idfun;
	}

	function setIdfun($idfun){
		$this->idfun = $idfun;
	}

	function getNomef(){
		return $this->nomef;
	}

	function setNomef($nomef){
		$this->nomef = $nomef;
	}

	function getSenhaf(){
		return $this->senhaf;
	}

	function setSenhaf($senhaf){
		$this->senhaf = $senhaf;
	}

	function getEmailf(){
		return $this->emailf;
	}

	function setEmailf($emailf){
		$this->emailf = $emailf;
	}
}

?>