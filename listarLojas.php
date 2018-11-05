<?php 
require_once 'Loja.php'; 
require_once 'LojaDAO.php'; 	
$banco_loja = new LojaDAO();
$lojas = $banco_loja->listarLojas();
?> 


<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Lojas</title>
            <link rel="stylesheet" href="Menu.css" type "text/css">
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

	<div class="cadastro">
		<a href="novaLoja.php" class="cadastrobutton">Cadastrar nova loja</a>
        </div>


        <div class="tabeladiscos">
		<table border=1>			
			<thead>			
			<tr>
				<th> Nome da loja </th>
				<th> Responsável </th>
				<th> Endereço </th>
				<th> Telefone </th>
			</tr>
			</thead>
			<tbody>
			<?php 
				foreach($lojas as $loja){				
			?>					
				<tr>
					<td><?php echo $loja->getNome() ?></td>
					<td><?php echo $loja->getDono() ?></td>
					<td><?php echo $loja->getRua(), ", ", $loja->getNumero(), ", ", $loja->getBairro(), ", ", $loja->getCEP(), ", ", $loja->getCidade() ?></td>
					
					<td><?php echo $loja->getTelefone() ?></td>
					<td><a href="verDiscos.php?id=<?php echo $loja->getIdLoja();?>" class="tablebutton">Detalhes</a></td>
					<td><a href="alterarLoja.php?id=<?php echo $loja->getIdLoja();?>" class="tablebutton">Editar</a></td>
					<td><a href="excluirLoja.php?id=<?php echo $loja->getIdLoja();?>" class="tablebutton">Excluir</a></td>
				</tr>
			<?php   }  ?>

			</tbody>
		</table>
        </div>


        <footer>
            <h4>Pearl Records 2018</h4>
        </footer>
    </body>
</html>
