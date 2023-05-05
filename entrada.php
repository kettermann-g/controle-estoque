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

    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/entrada.css">

    <title>Entrada</title>
</head>
<body>
    
    <header>
        <menu>
            <ul>
                <li class="cabecalho"><a href="index.php">INÍCIO</a></li>
                <li class="cabecalho"><a href="cadastroNew.php">CADASTRO</a></li>
                <li class="cabecalho pg_atual">ENTRADA</li>
                <li class="cabecalho"><a href="saida.php">SAÍDA</a></li>
                <li class="cabecalho"><a href="estoque.php">ESTOQUE</a></li>
            </ul>
        </menu>
    </header>

    <main>
        <div class="container" >

            <div class="content">
              <div id="entrada">
                <form method="post" action="">
                  <h1>Entrada</h1>
                  <p>
                    <label for="nf">Nota Fiscal</label>
                    <input id="nf" name="nf" required="required" type="number" placeholder="123456"/>
                  </p>
        
                  <p>
                    <label for="origem">Origem</label>
                    <input id="origem" name="origem" required="required" type="text" placeholder="Compra" />
                  </p>
                  
                  <a href="entrada.html">
                    <button class="button-submit">Cadastrar produto</button>
                  </a>
                </form>
              </div>
            </div>
        </div>
    </main>
    <footer>Desenvolvido por</footer>
    
    <script>
        const submitCheck = document.querySelector(".button-submit")

        console.log(submitCheck)
    </script>

</body>
</html>