<?php
	class Loja {
		private $dono;
		private $telefone;	
		private $id;
		private $rua;
		private $numero;
		private $bairro;
		private $cep;
		private $cidade;

		function getIdLoja(){
			return $this->id;
		}

		function setIdLoja($id){
			$this->id = $id;
		}

		function setDono($dono){
			$this->dono = $dono;
		}

		function getDono(){	
			return $this->dono;
		}

		function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		function getTelefone(){
			return $this->telefone;
		}

		function setRua($rua){
			$this->rua = $rua;
		}

		function getRua(){
			return $this->rua;
		}

		function setNumero($numero){
			$this->numero = $numero;
		}

		function getNumero(){
			return $this->numero;
		}

		function setBairro($bairro){
			$this->bairro = $bairro;
		}

		function getBairro(){
			return $this->bairro;
		}

		function setCEP($cep){
			$this->cep = $cep;
		}


		function getCEP(){
			return $this->cep;
		}

		function setCidade($cidade){
			$this->cidade = $cidade;
		}

		function getCidade(){	
			return $this->cidade;
		}

	}

?>
