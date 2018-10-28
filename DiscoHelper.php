<?php
	require_once 'Disco.php';
	require_once 'DiscoDAO.php';		
	$acao = $_GET["acao"];

	switch($acao){
		case 'novo':		
			$banco_disco = new DiscoDAO();			
			$disco = new Disco();
			
			$disco->setNomeDisco($_POST["nomedisco"]);
			$disco->setArtista($_POST["artista"]);
			$disco->setAnoLancado($_POST["anolancado"]);
			$disco->setGenero($_POST["genero"]);
		
			if($banco_disco->novo($disco)){
				echo "<script> alert (\"Disco salvo com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao salvar disco!\"); </script>";
			}
			echo "<script>location.href='listarDiscos.php'; </script>";			


		break;

		case 'excluir':
			$banco_disco = new DiscoDAO();		
			$id = $_GET["id"];

			if($banco_disco->excluir($id)){
				echo" <script> alert (\"Disco excluído com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao excluir disco!\"); </script>";
			}
			echo "<script>location.href='listarDiscos.php'; </script>";			
		
		break;

		case 'alterar':
			$banco_disco = new DiscoDAO();		
			$id = $_GET["id"];

			if($banco_disco->alterar($id)){
				echo" <script> alert (\"Disco alterado com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao alterar disco!\"); </script>";
			}
			echo "<script>location.href='listarDiscos.php'; </script>";		

		break;
	

/*		case 'consultarLojas':
			$banco_disco = new DiscoDAO();		
			$id = $_GET["id"];

			$banco_disco->($id);
	
		break;
*/	}








?>
