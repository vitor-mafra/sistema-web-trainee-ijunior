<?php
	require_once 'loja_disco.php';
	require_once 'loja_discoDAO.php';		

	$acao = $_GET["acao"];

	switch($acao){

		case 'alterarL':
			$banco_loja_disco = new Loja_DiscoDAO();
			$idDisco = $_GET["idD"];
			$idLoja = $_GET["idL"];
			if($banco_loja_disco->alterar($idDisco, $idLoja)){
				echo" <script> alert (\"Quantidade alterada com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao alterar quantidade!\"); </script>";
			}
				echo "<script>location.href='verLojas.php?id=$idDisco'</script>";

		break;
	
		case 'alterarD':
			$banco_loja_disco = new Loja_DiscoDAO();
			$idDisco = $_GET["idD"];
			$idLoja = $_GET["idL"];
			if($banco_loja_disco->alterar($idDisco, $idLoja)){
				echo" <script> alert (\"Quantidade alterada com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao alterar quantidade!\"); </script>";
			}
			echo "<script>location.href='verDiscos.php?id=$idLoja'</script>";
	
		break;			

		case 'consultarLojas':
			$banco_disco = new DiscoDAO();		
			$id = $_GET["id"];

			$banco_disco->consultarLojasDoDisco($id);
	
		break;

		case 'detalhes':
			$banco_loja = new LojaDAO();		
			$id = $_GET["id"];

			$banco_loja->consultarDiscosDaLoja($id);


		break;


	}








?>