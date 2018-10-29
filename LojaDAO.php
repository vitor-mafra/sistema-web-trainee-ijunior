<?php	
	class LojaDAO{
	
		public function conectar(){
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$bancodados = "PearlRecords";

			$conexao = new mysqli($servidor, $usuario, $senha, $bancodados);
			
			return $conexao;
		}


		public function novo($loja){
			$situacao = TRUE;
			try{
				$d = $this->conectar();
					
				$query = "INSERT INTO Loja(Dono, Telefone, EnderecoRua, EnderecoNumero, EnderecoBairro, EnderecoCEP, EnderecoCidade)
					 VALUES ('".$_POST["dono"]."','".$_POST["telefone"]."',	'".$_POST["rua"]."', '".$_POST["numero"]."', '".$_POST["bairro"]."', '".$_POST["cep"]."', '".$_POST["cidade"]."') ";

				$d->query($query);
				$codigo = $d->insert_id;
				$loja->setIdLoja($codigo);
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
					
				$query = "DELETE FROM Loja 
   					WHERE  IdLoja = {$id}";
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
				$query = "UPDATE Loja
					SET Dono = '".$_POST["dono"]."', Telefone = '".$_POST["telefone"]."',
					EnderecoRua = '".$_POST["rua"]."', EnderecoNumero = '".$_POST["numero"]."',
					EnderecoBairro = '".$_POST["bairro"]."', EnderecoCEP = '".$_POST["cep"]."',
					EnderecoCidade = '".$_POST["cidade"]."'
					WHERE IdLoja = $id";
				$d->query($query);
				$d->close();
				
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;

		}

		public function listarLojas(){
			$situacao = TRUE;
			$lojas = array();
			try{
				$d = $this->conectar();
				$query = "SELECT * FROM Loja";
				$resultado = $d->query($query);
				$d->close();
			
				while($registro = mysqli_fetch_assoc($resultado)){
					$loja = new Loja();
					$loja->setIdLoja($registro['IdLoja']);
					$loja->setDono($registro['Dono']);
					$loja->setTelefone($registro['Telefone']);
					$loja->setRua($registro['EnderecoRua']);
					$loja->setNumero($registro['EnderecoNumero']);
					$loja->setBairro($registro['EnderecoBairro']);
					$loja->setCEP($registro['EnderecoCEP']);
					$loja->setCidade($registro['EnderecoCidade']);
					array_push($lojas, $loja);				
				}
				$resultado->close();			
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $lojas;
		}
		

		function buscarPorId($codigo){
			$loja = new Loja();
			try{
				$d = $this->conectar();
				$query = "select * from Loja where IdLoja = {$codigo}";
				$resultado = $d->query($query);
				$d->close();
				$registro = mysqli_fetch_assoc($resultado);
				$loja->setIdLoja($registro['IdLoja']);
				$loja->setDono($registro['Dono']);
				$loja->setTelefone($registro['Telefone']);
				$loja->setRua($registro['EnderecoRua']);
				$loja->setNumero($registro['EnderecoNumero']);
				$loja->setBairro($registro['EnderecoBairro']);
				$loja->setCEP($registro['EnderecoCEP']);
				$loja->setCidade($registro['EnderecoCidade']);
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $loja;
		}


	}


?>
