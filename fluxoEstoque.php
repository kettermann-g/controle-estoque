<?php

  $titulo = "Fluxo de Estoque";
  include_once("templates/header.php");
  include_once("dao/ProdutoDAO.php");

  $produtoDAO = new ProdutoDAO($conexao);
  
  $produtos = $produtoDAO->findFluxo();

  

?>
  <main class="container">

<div class="content">
    <H1>FLUXO DE ESTOQUE</H1>
    <br>
        <table id="tabela">
            <thead>
                <tr>
                    <th>ID Movimento</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Medida</th>   
                    <th>Origem/Destino</th>
                    <th>Nota Fiscal</th>
                    <th>Tipo de movimento</th>
                    <th>Data</th>
                    <th>Lançado por:</th>
                </tr>
                <tr>
                    <th><input type="text" id="txtColuna1"/></th>
                    <th><input type="text" id="txtColuna2"/></th>
                    <th><input type="text" id="txtColuna3"/></th>
                    <th><input type="text" id="txtColuna4"/></th>
                    <th><input type="text" id="txtColuna5"/></th>
                    <th><input type="text" id="txtColuna6"/></th>
                    <th><input type="text" id="txtColuna7"/></th>
                    <th><input type="text" id="txtColuna8"/></th>
                    <th><input type="text" id="txtColuna9"/></th>
                    <th><input type="text" id="txtColuna10"/></th>
                </tr>            
            </thead>
            <tbody>
                <?php foreach ($produtos as $dado): ?>
                    <tr>
                        <td><?= $dado['idMovimento'] ?></td> 
                        <td><?= $dado['marca_item_mov'] ?></td> 
                        <td><?= $dado['descricao_item_mov'] ?></td> 
                        <td><?= $dado['quantidade_mov'] ?></td> 
                        <td><?= $dado['medida_mov'] ?></td>
                        <td><?= $dado['origem_destino'] ?></td>
                        <td><?= $dado['numeroNota'] ?></td>
                        <td><?= $dado['tipoMov'] ?></td>
                        <td><?= $dado['dataMov'] ?></td>
                        <td><?= $dado['username'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
  </main>
<?php include_once("templates/footer.php"); ?>

</body>
</html>