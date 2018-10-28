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
					
				$query = "DELETE t1, t2 FROM 
       					Disco as t1 
   					INNER JOIN  loja_disco as t2 on t1.IdDisco = t2.IdDisco
   					WHERE  t1.IdDisco = ".$_POST["id"]."";
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
					SET Artista = '".$_POST["artista"]."', AnoLancado = '".$_POST["anolancado"]."', Genero = '".$_POST["genero"]."', Nome = '".$_POST["nomedisco"]."'
					WHERE IdDisco = $id";
				$d->query($query);
				$d->close();
				
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}

		public function consultarLojas($id){
			$situacao = TRUE;
			try{
				$d = $this->conectar();
				$query = "SELECT IdLoja FROM Loja_Disco
					WHERE IdDisco = $id
					AND QtdDisco >= 1";
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

	}
?>
