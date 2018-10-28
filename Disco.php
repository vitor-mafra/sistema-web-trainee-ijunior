<?php
	class Disco {
		private $nome;
		private $artista;
		private $anolancado;	
		private $genero;
		private $id;
		
		function setIdDisco($id){
			$this->id = $id;
		}
	
		function setNomeDisco($nome){
			$this->nome = $nome;
		}

		function getNomeDisco(){
			return $this->nome;
		}

		function setArtista($artista){
			$this->artista = $artista;
		}

		function getArtista(){
			return $this->artista;
		}

		function setAnoLancado($anolancado){
			$this->anolancado = $anolancado;
		}

		function getAnoLancado(){
			return $this->anolancado;
		}

		function setGenero($genero){	
			$this->genero = $genero;
		}

		function getGenero(){
			return $this->genero;
		}
	}


?>
