<?php 
  $titulo = "Home";
  include_once("templates/header.php");
?>
    <main class="container">
        <div class="div-welcome">
            <h1 class="h1-welcome">Bem-vindo ao InventoryControl</h1>
            <p class="p-welcome">Monitore seu estoque de forma prática e acabe de vez com a perda de eficiência!</p>
        </div>
        <div class="div-art-welcome">
            <img class="art-welcome" src="./images/art-welcome.png">
        </div>
    </main>

  <?php include_once("templates/footer.php"); ?>
  <script src="https://kit.fontawesome.com/5fda86d671.js" crossorigin="anonymous"></script>
  <script src="<?= $BASE_URL ?>/js/index.js"></script>
</body>
</html>