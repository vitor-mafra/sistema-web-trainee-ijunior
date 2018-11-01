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
            <title>Cadastrar Disco - Pearl Records© 2018</title>
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
        <div class="formulario">	
			<form method="post" action="DiscoHelper.php?acao=novo">
				Nome do disco: <input name="nomedisco" type="text" required> <br>
				Artista: <input name="artista" type="text" required> <br>
				Ano de lançamento: <input name="anolancado" type="text"required> <br>
				Gênero: <input name="generi" type="text" required> <br>
				<button type="submit">Cadastrar</button>
			</form>

	</div>





        <footer>
            <h4>Pearl Records© 2018</h4>
        </footer>
    </body>
</html>
