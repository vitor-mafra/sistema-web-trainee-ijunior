<?php
require_once 'Loja.php';
require_once 'LojaDAO.php';

$banco_loja = new LojaDAO();
if(isset($_GET["id"])){
    $loja = $banco_loja->buscarPorId($_GET["id"]);
}
else{
    $loja = new Loja();
}
?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
            <title>Lojas</title>
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
			<form method="post" action="LojaHelper.php?acao=alterar&id=<?php echo $loja->getIdLoja();?>">
				Nome da loja: <input name="nome" type="text" required value="<?php echo $loja->getNome() ;?>"> <br> 
				Responsável: <input name="dono" type="text" required value="<?php echo $loja->getDono() ;?>"> <br>
				Endereço: <input name="rua" type="text" required value="<?php echo $loja->getRua(); ?>"> 
				<input name="numero" type="text" required value="<?php echo $loja->getNumero(); ?>">
				<input name="bairro" type="text" required value="<?php echo $loja->getBairro(); ?>">
				<input name="cep" type="text" required value="<?php echo $loja->getCEP(); ?>">
				<input name="cidade" type="text" required value="<?php echo $loja->getCidade(); ?>"> <br>
				Telefone: <input name="telefone" type="text"required value="<?php echo $loja->getTelefone() ;?>" > <br>
				<button type="submit">Salvar</button>
			</form>
			<form method="post" action="listarLojas.php">
				<button type="submit">Cancelar</button>
			</form>
			

	</div>





        <footer>
            <h4>Pearl Records 2018</h4>
        </footer>
    </body>
</html>
