<?php	
	class DiscoDAO{
	
		public function conectar(){
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$bancodados = "PearlRecords";

			$conexao = new mysqli($servidor, $usuario, $senha, $bancodados);
			
			return $conexao;
		}


		public function novo($disco){
			$situacao = TRUE;
			try{
				$d = $this->conectar();
					
				$query = "INSERT INTO Disco(Artista, AnoLancado, Genero, Nome)
					VALUES ('".$_POST["artista"]."','".$_POST["anolancado"]."',
					'".$_POST["genero"]."', '".$_POST["nomedisco"]."') ";
				$d->query($query);
				$codigo = $d->insert_id;
				$disco->setIdDisco($codigo);
				$d->close();
				
				
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $situacao;
		}

		public function excluir($id){
			$situacao = TRUE;
			try{
				$d = $this->conectar();
				
				$query = "DELETE FROM Loja_Disco
						WHERE  IdDisco = $id";
				$d->query($query);
				
				$query = "DELETE FROM Disco
						WHERE IdDisco = $id";
				$d->query($query);				

				$d->close();

				
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}
		


		public function alterar($id){
			$situacao = TRUE;
			try{
				$d = $this->conectar();
				$query = "UPDATE Disco
					SET Artista = '".$_POST["artista"]."', AnoLancado = '".$_POST["anolancado"]."', 
					Genero = '".$_POST["genero"]."', Nome = '".$_POST["nomedisco"]."'
					WHERE IdDisco = $id";
				$d->query($query);
				$d->close();
				
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}

		public function listarDiscos(){
			$situacao = TRUE;
			$discos = array();
			try{
				$d = $this->conectar();
				$query = "SELECT * FROM Disco";
				$resultado = $d->query($query);
				$d->close();
			
				while($registro = mysqli_fetch_assoc($resultado)){
					$disco = new Disco();
					$disco->setIdDisco($registro['IdDisco']);
					$disco->setNomeDisco($registro['Nome']);
					$disco->setArtista($registro['Artista']);
					$disco->setAnoLancado($registro['AnoLancado']);
					$disco->setGenero($registro['Genero']);
					array_push($discos, $disco);				
				}
				$resultado->close();			
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $discos;
		}
							 
		function buscarPorId($codigo){
			$disco = new Disco();
			try{
				$d = $this->conectar();
				$query = "select * from Disco where IdDisco = {$codigo}";
				$resultado = $d->query($query);
				$d->close();
				$registro = mysqli_fetch_assoc($resultado);
				$disco->setIdDisco($registro['IdDisco']);
				$disco->setNomeDisco($registro['Nome']);
				$disco->setArtista($registro['Artista']);
				$disco->setAnoLancado($registro['AnoLancado']);
				$disco->setGenero($registro['Genero']);
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $disco;
		}


	}
?>
