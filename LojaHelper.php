<?php		
	require_once 'Loja.php';
	require_once 'LojaDAO.php';		
	$acao = $_GET["acao"];

	switch($acao){
		case 'novo':		
			$banco_loja = new LojaDAO();			
			$loja = new Loja();
			
			$loja->setDono($_POST["dono"]);
			$loja->setNome($_POST["nome"]);
			$loja->setTelefone($_POST["telefone"]);
			$loja->setRua($_POST["rua"]);
			$loja->setNumero($_POST["numero"]);
			$loja->setBairro($_POST["bairro"]);
			$loja->setCEP($_POST["cep"]);
			$loja->setCidade($_POST["cidade"]);

			if($banco_loja->novo($loja)){
				echo "<script> alert (\"Loja salva com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao salvar loja!\"); </script>";
			}
			echo "<script>location.href='listarLojas.php'; </script>";		


		break;

		case 'excluir':
			$banco_loja = new LojaDAO();		
			$id = $_GET["id"];

			if($banco_loja->excluir($id)){
				echo" <script> alert (\"Loja excluída com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao excluir loja!\"); </script>";
			}
			echo "<script>location.href='listarLojas.php'; </script>";	
		

		break;

			
		case 'alterar':
			$banco_loja = new LojaDAO();		
			$id = $_GET["id"];

			if($banco_loja->alterar($id)){
				echo" <script> alert (\"Loja alterada com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao alterar loja!\"); </script>";
			}
			echo "<script>location.href='listarLojas.php'; </script>";

		break;




	}





?>
