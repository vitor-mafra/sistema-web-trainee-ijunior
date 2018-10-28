<?php 
require_once 'Disco.php'; 
require_once 'DiscoDAO.php'; 	
$banco_disco = new DiscoDAO();
$discos = $banco_disco->listarDiscos();
?> 


<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Discos</title>
            <link rel="stylesheet" href="Menu.css" type "text/css">
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
        <div class="tabeladiscos">
		<table border=1>			
			<thead>			
			<tr>
				<th> Nome do Disco</th>
				<th> Artista </th>
				<th> Ano Lançado </th>
				<th> Gênero </th>
				<th>  <th>
				<th>  <th>
				<th>  <th>
			</tr>
			</thead>
			<tbody>
			<?php 
				foreach($discos as $disco){				
			?>					
				<tr>
					<td><?php echo $disco->getNomeDisco() ?></td>
					<td><?php echo $disco->getArtista() ?></td>
					<td><?php echo $disco->getAnoLancado() ?></td>
					<td><?php echo $disco->getGenero() ?></td>
					<td><a href="DiscoHelper.php?acao=verlojas&id=<?php echo '$disco->getIdDisco()';?>" class="tablebutton">Ver lojas</a></td>
					<td><a href="DiscoHelper.php?acao=alterar&id=<?php echo '$disco->getIdDisco()';?>" class="tablebutton">Editar</a></td>
					<td><a href="DiscoHelper.php?acao=excluir&id=<?php echo '$disco->getIdDisco()';?>" class="tablebutton">Excluir</a></td>
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