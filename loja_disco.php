<?php
	class Loja_Disco {
		private $qtd;
		private $idDisco;
		private $idLoja;	

		function getIdDisco(){
			return $this->idDisco;
		}

		function setIdDisco($id){
			$this->idDisco = $id;
		}

		function getIdLoja(){
			return $this->idLoja;
		}

		function setIdLoja($id){
			$this->idLoja = $id;
		}

		function getQtd(){
			return $this->qtd;
		}

		function setQtd($qtd){
			$this->qtd = $qtd;
		}

	}


?>
