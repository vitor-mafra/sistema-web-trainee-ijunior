<?php		
	require_once 'Loja.php';
	require_once 'LojaDAO.php';		
	$acao = $_GET["acao"];

	switch($acao){
		case 'novo':		
			$banco_loja = new LojaDAO();			
			$loja = new Loja();
			
			$loja->setDono($_POST["dono"]);
			$loja->setTelefone($_POST["telefone"]);
			$loja->setEnderecoRua($_POST["rua"]);
			$loja->setEnderecoNumero($_POST["numero"]);
			$loja->setEnderecoBairro($_POST["bairro"]);
			$loja->setEnderecoCEP($_POST["cep"]);
			$loja->setEnderecoCidade($_POST["cidade"]);

			if($banco_loja->novo($loja)){
				echo "<script> alert (\"Loja salvo com sucesso!\"); </script>"
			} else {
				echo "<script> alert(\"Erro ao salvar loja!\"); </script>"
			}
			echo "<script>location.href='listarLojas.php'; </script>"			


		break;

		case 'excluir':
			$banco_loja = new LojaDAO();		
			$id = $_POST["id"];

			if($banco_loja->excluir($loja)){
				echo" <script> alert (\"Loja excluído com sucesso!\"); </script>"
			} else {
				echo "<script> alert(\"Erro ao excluir loja!\"); </script>"
			}
			echo "<script>location.href='listarLojas.php'; </script>"			
		

		break;

			
		case 'alterar':
			$banco_loja = new LojaDAO();		
			$id = $_GET["id"];

			if($banco_disco->alterar($id)){
				echo" <script> alert (\"Loja alterada com sucesso!\"); </script>"
			} else {
				echo "<script> alert(\"Erro ao alterar loja!\"); </script>"
			}
			echo "<script>location.href='listarLojas.php'; </script>"		

		break;




	}





?>
