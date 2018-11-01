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
            <title>Cadastrar Loja - Pearl Records© 2018</title>
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
			<form method="post" action="LojaHelper.php?acao=novo">
				Nome da loja: <input name="nome" type="text" required > <br> 
				Responsável: <input name="dono" type="text" required ><br>
				Endereço: <input name="rua" type="text" required placeholder="Rua"> 
				<input name="numero" type="text" required placeholder="Número">
				<input name="bairro" type="text" required placeholder="Bairro">
				<input name="cep" type="text" required placeholder="CEP">
				<input name="cidade" type="text" required placeholder="Cidade"> <br>
				Telefone: <input name="telefone" type="text"required  > <br>
				<button type="submit">Salvar</button>
			</form>
			<form method="post" action="listarDiscos.php">
				<button type="submit">Cancelar</button>
			</form>
			

	</div>





        <footer>
            <h4>Pearl Records© 2018</h4>
        </footer>
    </body>
</html>
