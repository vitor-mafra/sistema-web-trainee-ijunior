<?php
	require_once 'loja_disco.php';
	require_once 'loja_discoDAO.php';		
	$acao = $_GET["acao"];

	switch($acao){

		case 'alterar':
			$banco_loja_disco = new Loja_DiscoDAO();
			$idDisco = $_GET["idD"];
			$idLoja = $_GET["idL"];
			if($banco_loja_disco->alterar($idDisco, $idLoja)){
				echo" <script> alert (\"Quantidade alterado com sucesso!\"); </script>";
			} else {
				echo "<script> alert(\"Erro ao alterar quantidade!\"); </script>";
			}
			echo "<script>location.href='verLojas.php'; </script>";		

		break;
	

		case 'consultarLojas':
			$banco_disco = new DiscoDAO();		
			$id = $_GET["id"];

			$banco_disco->consultarLojasDoDisco($id);
	
		break;
	}








?>
