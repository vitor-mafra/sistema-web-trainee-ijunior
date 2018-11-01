<?php
require_once 'loja_disco.php';
require_once 'loja_discoDAO.php';

$banco_loja_disco = new Loja_DiscoDAO();
$loja_disco = $banco_loja_disco->buscarPorId($_GET["idD"], $_GET["idL"]);

?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Alterar quantidade - Pearl Records© 2018</title>
            <link rel="stylesheet" href="Menu.css" type="text/css">
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
			<form method="post" action="loja_discoHelper.php?acao=alterarD&idD=<?php echo $loja_disco->getIdDisco();?>&idL=<?php echo $loja_disco->getIdLoja();?>">
				Quantidade: <input name="qtd" type="number" required value="<?php echo $loja_disco->getQtd() ;?>"> <br>
				<button type="submit">Salvar</button>
			</form>

		</div>





        <footer>
            <h4>Pearl Records© 2018</h4>
        </footer>
    </body>
</html>
