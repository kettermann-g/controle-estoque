<?php
  $titulo = "Estoque";
  include_once("templates/header.php");
  include_once("php/conexao.php");
  include_once("php/url.php");
  
  $query = $conexao->prepare("SELECT * FROM estoque");
  $query->execute();
  $res = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?= $BASE_URL ?>../js/tableFilter.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/estoque.css">

    <title>Estoque</title>
</head>

<body>
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
                    <th>ID Medida</th>
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
                <?php foreach ($res as $dado): ?>
                    <tr>
                        <td><?= $dado['idProduto'] ?></td> 
                        <td><?= $dado['marca'] ?></td> 
                        <td><?= $dado['descricao'] ?></td>
                        <td><?= $dado['id_medida'] ?></td>
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