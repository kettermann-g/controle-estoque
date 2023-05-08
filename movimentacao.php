<?php
  $titulo = "Novo Cadastro";
  include_once("templates/header.php");
  include_once("dao/NotaFiscalDAO.php");

  $notaFiscal = new NotaFiscalDAO($conexao);

  $allNotas = $notaFiscal->findAllNotas($user->id);

  
?>

          
    <main class="container">
          <table>
            <thead>
              <tr>
                <th>Suas Notas:</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($allNotas as $nota): ?>
                <tr><td><?= $nota['numeroNota'] ?></td></tr>
              <?php endforeach; ?>
            </tbody>
          </table>
    
        <div class="container-form" id="container-form">
          
            <form action="cadastro.php" method="post" id="formulario">
                <h1 class="h1-cadastro">Movimentação de estoque</h1>
            <div class="form-inputs-container">
                <input class="input" id="referencia" name="referencia" required="required" type="number" max="999999" placeholder="Nota fiscal"/>

                <!-- <input class="input" id="origem" name="origem" required="required" type="text" placeholder="Origem ou destino"/> -->

                <div class="radio-container">
                    <input type="radio" id="entrada-radio" name="movi" value="entrada"
                            checked>
                    <label for="entrada">Entrada</label>
                </div>

                <div class="radio-container">
                    <input type="radio" id="saida-radio" name="movi" value="saida">
                    <label for="saida">Saída</label>
                </div>

                <input type="submit" id="submit-button"></input>
            </div>
            </form>
        </div>
    </main>

    <?php include_once("templates/footer.php"); ?>

    <script src="<?= $BASE_URL ?>/js/validationCadastro.js"></script>
    
</body>
</html>