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
  <title>Cadastrar</title>

  <link rel="stylesheet" href="<?= $BASE_URL ?>/css/style.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/css/stylesLogin.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <script src="<?= $BASE_URL ?>/js/jQuery/jquery-3.7.0.js"></script>
</head>
<body>
    
  <div class="container cadastro" id="container-cadastro">
    <div class="left">
      <h1 class="title-left">Comece agora mesmo<br>seu cadastro!</h1>
    
      <p class="p-left"></p>
      <button class="button-left" onclick="location.href='<?= $BASE_URL ?>/login.php';" >Voltar</button>
    </div>
    <div class="right">
      <form action="php/processoCadastroUser.php" method="POST" id="form-login">

        <div class="input-field">
          <label class="label-form" for="username">Username:</label>
          <input id="username" name="username" type="text" placeholder="Digite seu username">
        </div>

        <div class="input-field">
          <label class="label-form" for="nome" >Nome:</label>
          <input id="nome" name="nome" type="text" placeholder="Digite seu nome">
        </div>

        <div class="input-field">
          <label class="label-form" for="email" >E-mail:</label>
          <input id="email" name="email" type="email" placeholder="Digite seu e-mail">
        </div>

        <div class="input-field" id="senha-cad">
          <label class="label-form" for="senha" >Senha:</label>
          <input id="senha" name="senha" type="password" required="required" placeholder="Senha">
        </div>

        <div class="input-field" id="conf-senha-cad">
          <label class="label-form" for="confirmar-senha" >Confirme a senha:</label>
          <input id="confirmar-senha-text" name="confirmar-senha" type="password" required="required" placeholder="Confirme aqui a sua senha">
        </div>

        <div>
          <p id="caracteres-senha" class="senhas-nao-coincidem"><i id="id-i-senha-caracteres" class="fa-solid fa-circle-xmark"></i> A senha precisa ter 8 caracteres ou mais</p>
          <p id="conf-senha-texto" class="senhas-nao-coincidem"><i id="id-i-senha-igual" class="fa-solid fa-circle-xmark"></i> As senhas precisam ser iguais</p>
        </div>

        <div class="input-field">
          <label class="label-form" for="cnpj" >CNPJ:</label>
          <input id="cnpj" name="cnpj" type="text" required="required" placeholder="Digite seu CNPJ">
        </div>


        <input class="button-right button-cadastrar" id="button-right" type="submit" value="cadastrar" disabled>
      </form>
    </div>
  </div>
  
  <script src="https://kit.fontawesome.com/5fda86d671.js" crossorigin="anonymous"></script>
  <script src="<?= $BASE_URL ?>/js/confirmar-senhas.js"></script>
  

</body>
</html>