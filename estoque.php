<?php
  $titulo = "Estoque";
  include_once("templates/header.php");
  include_once("dao/ProdutoDAO.php");

  $produtoDAO = new ProdutoDAO($conexao);
  
  $produtos = $produtoDAO->findAll($user->id);

?>
  <main class="container">

<div class="content">
    <H1>ESTOQUE ATUAL</H1>
    <br>
        <table id="tabela">
            <thead>
                <tr>
                    <th>ID Produto</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Medida</th>
                    <th>Quantidade</th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1"/></th>
                    <th><input type="text" id="txtColuna2"/></th>
                    <th><input type="text" id="txtColuna3"/></th>
                    <th><input type="text" id="txtColuna4"/></th>
                    <th><input type="text" id="txtColuna5"/></th>
                </tr>            
            </thead>
            <tbody>
                <?php foreach ($produtos as $dado): ?>
                    <tr>
                        <td><?= $dado['idProduto'] ?></td> 
                        <td><?= $dado['marca'] ?></td> 
                        <td><?= $dado['descricao'] ?></td>
                        <td><?= $dado['medida'] ?></td>
                        <td><?= $dado['quantidade'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
  </main>
<?php include_once("templates/footer.php"); ?>

</body>
</html>