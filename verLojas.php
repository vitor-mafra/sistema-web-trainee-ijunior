<?php
require_once 'loja_disco.php';
require_once 'loja_discoDAO.php';

$banco_loja_disco = new Loja_DiscoDAO();
$loja_disco = $banco_loja_disco->consultarLojasDoDisco($_GET["id"]);

require_once 'Disco.php'; 
require_once 'DiscoDAO.php'; 	

$banco_disco = new DiscoDAO();
$disco = new Disco();
$disco = $banco_disco->buscarPorId($_GET["id"]);

require_once 'Loja.php';
require_once 'LojaDAO.php';

$banco_loja = new LojaDAO();
$loja = new Loja();
$lojas = $banco_loja->listarLojas();

?>


<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Discos</title>
            <link rel="stylesheet" type="text/css" href="Menu.css">
    </head>
    <body>
        <header>
            <nav class="menu">
                <ul>
                    <li><a href = "index.php">Página Inicial</a></li>
                    <li><a href = "listarLojas.php">Lojas</a></li>
                    <li><a href = "listarDiscos.php">Discos</a></li>
                </ul>
            </nav>
        </header>

	<div>
		<h3> Nome do Disco: <?php echo $disco->getNomeDisco() ?> </h3>
	</div>

	<div>
		<table border=1>			
			<thead>			
			<tr>
		
				<th> Loja </th>
				<th> Quantidade </th>
			</tr>
			</thead>
			<tbody>
			<?php 
				foreach($loja_disco as $relacao){
					$idLoja = $relacao->getIdLoja();
					$loja = $banco_loja->buscarPorId($idLoja);	
					$aux = 2;			
			?>					
				<tr>
					<td><?php echo $loja->getNome() ?></td>
					<td><?php echo $relacao->getQtd() ?></td>
					<td><a href="alterarQtdLoja.php?idD=<?php echo $relacao->getIdDisco();?>&idL=<?php echo $relacao->getIdLoja();?>" class="tablebutton">Editar</a></td>
					<td><a href="loja_discoHelper.php?acao=excluirL&idL=<?php echo $relacao->getIdLoja(); ?>&idD=<?php echo $relacao->getIdDisco(); ?>" class="tablebutton">Remover disco dessa loja</a></td>
				</tr>
			<?php   }  ?>

			</tbody>
		</table>

	</div>
	
	<div class="formulario">	
			<form method="post" action="loja_discoHelper.php?acao=adicionarL&idD=<?php echo $disco->getIdDisco(); ?>">
				Adicione esse disco à outras lojas: <select name="idL">
		  			<option disabled value="padrao">Escolher loja</option>
					<?php	
				   foreach($lojas as $loja) {
					?>
		           <option value="<?php echo $loja->getIdLoja()?>"> <?php echo $loja->getNome() ?> </option>
		             
					<?php } ?>

  		 		</select>
				<button type="submit">Salvar</button>
			</form>
	</div>

    <a href="listarDiscos.php" class="voltarbutton">Voltar</a>








	<footer>
            <h4>Pearl Records 2018</h4>
        </footer>
    </body>
</html>
