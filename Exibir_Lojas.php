<!-- Teste -->
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pearl Records 2018</title>
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link type="text/css" href="css/css.css" rel="stylesheet">
        <!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/css.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="teste.html">Pearl Records</a>
            </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="teste.html">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lojas
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href = "Exibir_Lojas.html">Exibir Lojas</a></li>
                            <li><a href = "Cadastro_Lojas.html">Cadastrar Lojas</a></li>
                            <li><a href = "Editar_Lojas.html">Editar Lojas</a></li>
                            <li><a href = "Excluir_Lojas.html">Excluir Lojas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Discos
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href = "Exibir_Discos.html">Exibir Discos</a></li>
                            <li><a href = "Cadastro_Discos.html">Cadastrar Discos</a></li>
                            <li><a href = "Editar_Discos.html">Editar Discos</a></li>
                            <li><a href = "Exluir_Discos.html">Excluir Discos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mais
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Mais.html">Mais</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div> 
            <nav class = "Tabela"> <!-- Nesta parte devemos implementar o PHP para que a tabela apareça com as lojas cadastradas no banco de dados, 
                    e para que os botôes façam suas respectivas ações no BD-->
                <table border = 1>
                    <tr>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Responsável</th>
                    </tr>
                    <tr>
                        <td> Rua da Imaginação <!--aqui viria o PHP para inserir os dados automaticamente nas respectivas rows da tabela --> <!-- acho que eu teria de criar algo para automaticamente inserir o respectido td --></td>
                        <td>(0xx)xxxx-xxxx</td>
                        <td>Fulano</td>
                    </tr>
                </table>
            </nav>
        </div>
        <div class="tabeladiscos">
            <table border=1>			
                <thead>			
                <tr>
                    <th> Responsável </th>
                    <th> Endereço </th>
                    <th> Telefone </th>
                    <th>  <th>
                    <th>  <th>
                    <th>  <th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($lojas as $loja){				
                ?>					
                    <tr>
                        <td><?php echo $loja->getDono() ?></td>
                        <td><?php echo $loja->getRua(), ", ", $loja->getNumero(), ", ", $loja->getBairro(), ", ", $loja->getCEP(), ", ", $loja->getCidade() ?></td>
                            
                        <td><?php echo $loja->getTelefone() ?></td>
                        <td><a href="LojaHelper.php?acao=detalhes&id=<?php echo '$loja->getIdLoja()';?>" class="tablebutton">Detalhes</a></td>
                        <td><a href="LojaHelper.php?acao=alterar&id=<?php echo '$disco->getIdLoja()';?>" class="tablebutton">Editar</a></td>
                        <td><a href="LojaHelper.php?acao=excluir&id=<?php echo '$disco->getIdLoja()';?>" class="tablebutton">Excluir</a></td>
                    </tr>
                <?php   }  ?>
    
                </tbody>
            </table>
        </div>
    <footer>Pearl Records 2018</footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>