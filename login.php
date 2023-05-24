<?php
  include_once("php/conexao.php");
  include_once("php/url.php");

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="<?= $BASE_URL ?>/css/style.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/css/responsive.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/css/stylesLogin.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  
</head>
<body>
    
  <div class="container">
    <div class="left">
        <h1 class="title-left">Bem-vindo!</h1>
        <p class="p-left">Ainda não tem uma conta e gostaria de fazer parte da nossa história? Cadastre-se agora!</p>
        <button class="button-left" onclick="location.href='<?= $BASE_URL ?>/cadastroUser.php';" >Cadastre-se</button>
      </div>
      <div class="right">
        <form action="<?= $BASE_URL ?>/php/processoLogin.php" method="POST" id="form-login">
          <div class="input-field">
            <input id="email" name="email" type="email" placeholder="Email">
          </div>
          <div class="input-field">
            <input id="senha" name="senha" type="password" required="required" placeholder="Senha">
          </div>
          <button class="button-right" id="button-right" type="submit">Entrar</button>
        </form>
      </div>
    </div>
    <script src="styleLogin.js"></script>

  
  <script src="https://kit.fontawesome.com/5fda86d671.js" crossorigin="anonymous"></script>
  <script src="<?= $BASE_URL ?>/js/index.js"></script>
  <script src="<?= $BASE_URL ?>/js/validationCadastro.js"></script>

</body>
</html>