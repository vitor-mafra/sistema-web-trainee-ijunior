<?php
require_once 'Disco.php';
require_once 'DiscoDAO.php';

$banco_disco = new DiscoDAO();
if(isset($_GET["id"])){
    $disco = $banco_disco->buscarPorId($_GET["id"]);
}
else{
    $disco = new Disco();
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
			<form method="post" action="DiscoHelper.php?acao=alterar&id=<?php echo $disco->getIdDisco();?>">
				Nome do disco: <input name="nomedisco" type="text" required value="<?php echo $disco->getNomeDisco() ;?>"> <br>
				Artista: <input name="artista" type="text" required value="<?php echo $disco->getArtista(); ?>"> <br>
				Ano de lançamento: <input name="anolancado" type="text"required value="<?php echo $disco->getAnoLancado() ;?>" > <br>
				Gênero: <input name="genero" type="text" required value="<?php echo $disco->getGenero() ;?>"> <br>
				<button type="submit">Salvar</button>
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
