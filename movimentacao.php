<?php
  $titulo = "Novo Cadastro";
  include_once("php/conexao.php");
  include_once("php/url.php");
  include_once("templates/header.php");
?>

    <main class="container">
        <div class="container-form" id="container-form">
            <form action="cadastro.php" method="post" id="formulario">
                <h1 class="h1-cadastro">Cadastro</h1>
            <div class="form-inputs-container">
                <input class="input" id="referencia" name="referencia" required="required" type="number" max="999999" placeholder="Referência do produto"/>

                <input class="input" id="produto" name="produto" required="required" type="text" placeholder="Nome do produto"/>

                <input class="input" id="valor_unitario" name="valor_unitario" required="required" type="number" max="999999" placeholder="Valor unitário"/>
            
                <input class="input" id="descricao" name="descricao" required="required" type="text" placeholder="Descrição do produto"/>

                <input type="submit" id="submit-button"></input>
            </div>
            </form>
        </div>
    </main>

    <?php include_once("templates/footer.php"); ?>

    <script src="<?= $BASE_URL ?>/js/validationCadastro.js"></script>
    
</body>
</html>