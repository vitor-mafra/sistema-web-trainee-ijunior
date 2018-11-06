<?php
require_once 'Loja.php';
require_once 'LojaDAO.php';

$banco_loja = new LojaDAO();
if(isset($_GET["id"])){
    $loja = $banco_loja->buscarPorId($_GET["id"]);
}
?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Excluir Loja - Pearl Records© 2018</title>
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
        <div class="formulario">	
			<form method="post" action="LojaHelper.php?acao=excluir&id=<?php echo $loja->getIdLoja();?>">
				<h3>Você tem certeza que deseja excluir essa loja?</h3>
				<button type="submit">Excluir</button>
			</form>

			<form method="post" action="listarLojas.php">
				<button type="submit">Cancelar</button>
			</form>
			

	</div>





        <footer>
		<h4>Pearl Records© 2018</h4>
        </footer>
    </body>
</html>
