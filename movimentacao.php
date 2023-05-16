<?php

  $titulo = "Novo Cadastro";
  include_once("templates/header.php");
  include_once("dao/NotaFiscalDAO.php");

  $notaFiscal = new NotaFiscalDAO($conexao);

  $allNotas = $notaFiscal->findNotasDisponiveis();

  
?>

          
    <main class="container">
          <table>
            <thead>
              <tr>
                <th>Suas Notas:</th>
              </tr>
            </thead>
            <tbody>
              <?php if($allNotas): ?>
              <?php foreach($allNotas as $nota): ?>
                <tr><td><?= $nota['numeroNota'] ?></td></tr>
              <?php endforeach; ?>
              <?php else: ?>
                <tr><td>Nenhuma nota disponível</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
    
        <div class="container-form" id="container-form">
          
            <form action="<?= $BASE_URL ?>/php/processoLancarNota.php" method="post" id="formulario">
                <h1 class="h1-cadastro">Movimentação de estoque</h1>
            <div class="form-inputs-container">
                <input type="text" class="input" id="numero-nota" name="numero-nota" required="required" placeholder="Nota fiscal"/>

                <input class="input" id="origem" name="origem" required="required" type="text" placeholder="Origem ou destino"/>

                <input type="submit" id="submit-button"></input>
            </div>
            </form>
        </div>
    </main>

    <?php include_once("templates/footer.php"); ?>

    <script src="<?= $BASE_URL ?>/js/validationCadastro.js"></script>
    
</body>
</html>