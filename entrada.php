<?php 
$titulo = "Entrada";
include_once("templates/header.php");
?>

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
    <?php include_once("templates/footer.php") ?>
    
    <script>
        const submitCheck = document.querySelector(".button-submit")

        console.log(submitCheck)
    </script>

</body>
</html>