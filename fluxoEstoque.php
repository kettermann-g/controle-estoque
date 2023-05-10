<?php

  $titulo = "Fluxo de Estoque";
  include_once("templates/header.php");
  include_once("dao/ProdutoDAO.php");

  $produtoDAO = new ProdutoDAO($conexao);
  
  $produtos = $produtoDAO->findFluxo($user->id);

  

?>
  <main class="container">

<div class="content">
    <H1>FLUXO DE ESTOQUE</H1>
    <br>
        <table id="tabela">
            <thead>
                <tr>
                    <th>ID Movimento</th>
                    <th>ID Produto</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Tipo Movimento</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                    <th>ID Usuario</th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1"/></th>
                    <th><input type="text" id="txtColuna2"/></th>
                    <th><input type="text" id="txtColuna3"/></th>
                    <th><input type="text" id="txtColuna4"/></th>
                    <th><input type="text" id="txtColuna5"/></th>
                    <th><input type="text" id="txtColuna6"/></th>
                    <th><input type="text" id="txtColuna7"/></th>
                </tr>            
            </thead>
            <tbody>
                <?php foreach ($produtos as $dado): ?>
                    <tr>
                        <td><?= $dado['idMovimento'] ?></td> 
                        <td><?= $dado['IDprod'] ?></td> 
                        <td><?= $dado['marca'] ?></td> 
                        <td><?= $dado['descricao'] ?></td> 
                        <td><?= $dado['tipoMovimento'] ?></td>
                        <td><?= $dado['quantidade'] ?></td>
                        <td><?= $dado['dataFormatada'] ?></td>
                        <td><?= $dado['id_usuario'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
  </main>
<?php include_once("templates/footer.php"); ?>

</body>
</html>