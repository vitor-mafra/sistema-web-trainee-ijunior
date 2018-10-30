<?php	
	class Loja_DiscoDAO{
	
		public function conectar(){
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$bancodados = "PearlRecords";

			$conexao = new mysqli($servidor, $usuario, $senha, $bancodados);
			
			return $conexao;
		}

		public function alterar($idDisco, $idLoja){
			$situacao = TRUE;
			try{
				$d = $this->conectar();
				$query = "UPDATE Loja_Disco
					SET QtdDisco = '".$_POST["qtd"]."'
					WHERE IdDisco = $idDisco AND IdLoja = $idLoja";
				$d->query($query);
				$d->close();
				
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}

		public function consultarLojasDoDisco($id){
			$situacao = TRUE;
			$lojas_disco = array();
			try{
				$d = $this->conectar();
				$query = "SELECT * FROM Loja_Disco
					WHERE IdDisco = {$id}"; //and qtd>0??
				$resultado = $d->query($query);
				$d->close();

				while($registro = mysqli_fetch_assoc($resultado)){
					$loja_disco = new Loja_Disco();
					$loja_disco->setIdLoja($registro['IdLoja']);
					$loja_disco->setIdDisco($registro['IdDisco']);
					$loja_disco->setQtd($registro['QtdDisco']);
					array_push($lojas_disco, $loja_disco);				
				}
				$resultado->close();	

			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $lojas_disco;
		}

		public function consultarDiscosDaLoja($id){
			$situacao = TRUE;
			$loja_discos = array();
			try{
				$d = $this->conectar();
				$query = "SELECT * FROM Loja_Disco
					WHERE IdLoja = {$id}";
				$resultado = $d->query($query);
				$d->close();
			
				while($registro = mysqli_fetch_assoc($resultado)){
					$loja_disco = new Loja_Disco();
					$loja_disco->setIdLoja($registro['IdLoja']);
					$loja_disco->setIdDisco($registro['IdDisco']);
					$loja_disco->setQtd($registro['QtdDisco']);
					array_push($loja_discos, $loja_disco);				
				}
				$resultado->close();	
	
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $loja_discos;
		}

		
		public function buscarPorId($idDisco, $idLoja){
			$loja_disco = new Loja_Disco();
			try{
				$d = $this->conectar();
				$query = "SELECT * FROM Loja_Disco
					WHERE IdDisco = {$idDisco}
					AND IdLoja = {$idLoja}";
				$resultado = $d->query($query);
				$d->close();
				$registro = mysqli_fetch_assoc($resultado);
				$loja_disco->setIdLoja($registro['IdLoja']);
				$loja_disco->setIdDisco($registro['IdDisco']);
				$loja_disco->setQtd($registro['QtdDisco']);

			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $loja_disco;
		}

	}

?>
