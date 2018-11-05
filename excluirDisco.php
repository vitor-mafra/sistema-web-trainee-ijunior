<?php
require_once 'Disco.php';
require_once 'DiscoDAO.php';

$banco_disco = new DiscoDAO();
if(isset($_GET["id"])){
    $disco = $banco_disco->buscarPorId($_GET["id"]);
}
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
        <div class="formulario">	
			<form method="post" action="DiscoHelper.php?acao=excluir&id=<?php echo $disco->getIdDisco();?>">
				<h3>Você tem certeza que deseja excluir esse disco?</h3>
				<button type="submit">Excluir</button>
			</form>

			<form method="post" action="listarDiscos.php">
				<button type="submit">Cancelar</button>
			</form>
			

	</div>





        <footer>
            <h4>Pearl Records 2018</h4>
        </footer>
    </body>
</html>
