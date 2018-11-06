<?php
require_once 'loja_disco.php';
require_once 'loja_discoDAO.php';

$banco_loja_disco = new Loja_DiscoDAO();
$loja_disco = $banco_loja_disco->consultarDiscosDaLoja($_GET["id"]);
require_once 'Loja.php';
require_once 'LojaDAO.php';

$banco_loja = new LojaDAO();
$loja = new Loja();
$loja = $banco_loja->buscarPorId($_GET["id"]);

require_once 'Disco.php'; 
require_once 'DiscoDAO.php'; 	

$banco_disco = new DiscoDAO();
$disco = new Disco();
$discos = $banco_disco->listarDiscos();
?>


<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Ver Discos - Pearl Records© 2018</title>
            <link rel="stylesheet" type="text/css" href="Menu.css">
    </head>
    <body>
        <header>
            <nav class="menu">
                <ul>
                    <li><a href = "index.php">Home</a></li>
                    <li><a href = "listarLojas.php">Lojas</a></li>
                    <li><a href = "listarDiscos.php">Discos</a></li>
                </ul>
            </nav>
        </header>

	<div>
		<h3> Nome da Loja: <?php echo $loja->getNome() ?> </h3>
	</div>

	<div class = "tabeladiscos">
		<table border=1>			
			<thead>			
			<tr>
		
				<th> Disco </th>
				<th> Quantidade </th>
			</tr>
			</thead>
			<tbody>
			<?php 
				foreach($loja_disco as $relacao){
					$idDisco = $relacao->getIdDisco();
					$disco = $banco_disco->buscarPorId($idDisco);
			?>					
				<tr>
					<td><?php echo $disco->getNomeDisco() ?></td>
					<td><?php echo $relacao->getQtd() ?></td>
					<td><a href="alterarQtdDisco.php?idD=<?php echo $relacao->getIdDisco();?>&idL=<?php echo $relacao->getIdLoja();?>" class="tablebutton">Editar</a></td>
					<td><a href="loja_discoHelper.php?acao=excluirD&idL=<?php echo $relacao->getIdLoja(); ?>&idD=<?php echo $relacao->getIdDisco(); ?>" class="tablebutton">Remover disco da loja</a></td>
					
				</tr>
			<?php   }  ?>

			</tbody>
		</table>

	</div>

		<div class="formulario">	
			<form method="post" action="loja_discoHelper.php?acao=adicionarD&idL=<?php echo $loja->getIdLoja(); ?>">
				Adicione um novo disco a essa loja: <select name="idD">
		  			<option disabled value="padrao">Escolher disco</option>
		  			
					<?php	
				   foreach($discos as $disco) {
					?>

		             <option value="<?php echo $disco->getIdDisco() ?>"> <?php echo $disco->getNomeDisco() ?> </option>
		             
					<?php } ?>

  		 		</select>
				<button type="submit">Salvar</button>
			</form>
		</div>
	<a href="listarLojas.php" class="voltarbutton">Voltar</a>        
	





	<footer>
            <h4>Pearl Records© 2018</h4>
        </footer>
    </body>
</html>
