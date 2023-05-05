<?php
  include_once("php/conexao.php");
  include_once("php/url.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/saida.css">

    <title>Saída</title>
</head>
<body>
    
    <header>
        <menu>
            <ul>
                <li class="cabecalho"><a href="www.g1.globo.com">INÍCIO</a></li>
                <li class="cabecalho"><a href="cadastro.html">CADASTRO</a></li>
                <li class="cabecalho"><a href="entrada.html">ENTRADA</a></li>
                <li class="cabecalho pg_atual">SAÍDA</li>
                <li class="cabecalho"><a href="estoque.html">ESTOQUE</a></li>
            </ul>
        </menu>
    </header>

    <main>
        <div class="container" >

            <div class="content">
              <div id="saida">
                <form method="post" action="">
                  <h1>Saída</h1>
                  <p>
                    <label for="nf">Nota Fiscal</label>
                    <input id="nf" name="nf" required="required" type="number" placeholder="123456"/>
                  </p>
        
                  <p>
                    <label for="destino">Destino</label>
                    <input id="destino" name="destino" required="required" type="text" placeholder="Venda" />
                  </p>
                  
                  
        
                  <p>
                    <input type="submit" value="Cadastrar Saída" />
                  </p>
                </form>
              </div>
            </div>
        </div>
    </main>
    <footer>Desenvolvido por</footer>
    
</body>
</html>