<?php

  $titulo = "Fluxo de Estoque";
  include_once("templates/header.php");
  include_once("dao/ProdutoDAO.php");

  $produtoDAO = new ProdutoDAO($conexao);
  
  (!isset($_GET['username']) && !isset($_GET['id'])) ?  $produtos = $produtoDAO->findFluxo() : $produtos = $produtoDAO->findFluxoByUser($_GET['username'], $_GET['id']);
    
    
  
  

?>

<style>
    .content{
      width: 1000px;
      margin: 30px auto;
    }

    #tabela{
    width: 100%;
    border: solid 1px;
    text-align: center;
    }

    #tabela tbody tr{
    border: solid 1px;
    height: 30px;
    cursor: pointer;
    text-align: center;
    }

    #tabela input{
    color: navy;
    width: 100%;
    }

    h2 {
      margin: 15px 0px;
    }

    .username-filter-span {
      color: #38B6FF;
      font-weight: 500;
    }
</style>

  <main class="container">

<div class="content">
    
    <br>
    <?php if ($produtos): ?>
      <h1>FLUXO DE ESTOQUE</h1>
      <?php if(isset($_GET['username'])): ?>
        <h2>Filtrado por: 
          <span class="username-filter-span">
            <?= $_GET['username'] ?>
          </span>
        </h2>
        <h3><a href="<?= $BASE_URL ?>/fluxoEstoque.php">Remover filtros</a></h3>
      <?php endif; ?>
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
                        <td><a href="<?= $BASE_URL ?>/fluxoEstoque.php?username=<?= $dado['username'] ?>&id=<?= $dado['id_usuario'] ?>"><?= $dado['username'] ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      <?php else: ?>
        <h1>Não há nenhum registro de fluxo de estoque.</h1>
      <?php endif; ?>
    </div>
    
  </main>
<?php include_once("templates/footer.php"); ?>

</body>
</html>