<?php

  include_once("php/url.php");
  include_once("php/conexao.php");
  include_once("dao/UserDAO.php");

  $logado = isset($_SESSION['id']) && isset($_SESSION['username']);

  $pagina = $_SERVER['REQUEST_URI'];

  if ($logado) {
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userDAO = new UserDAO($conexao);
    $user = $userDAO->findUserLogin($id, $username);

  }


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/navbarStyle.css">
    
    <?php if ($pagina == "/controle-estoque/movimentacao.php" || $pagina == "/controle-estoque/movimentacao" ): ?>
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/cadastroNew.css">
    <?php endif; ?>

    <?php if ($pagina == "/controle-estoque/estoque.php" || $pagina == "/controle-estoque/estoque" ): ?>
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/estoque.css">
    <?php endif; ?>

    <?php if ($pagina == "/controle-estoque/fluxoEstoque.php" || $pagina == "/controle-estoque/fluxoEstoque" ): ?>
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/estoque.css">
    <?php endif; ?>

    <!-- <?php if ($pagina == "/controle-estoque/estrada" || $pagina == "/controle-estoque/entrada.php"): ?>
      <link rel="stylesheet" href="<?= $BASE_URL ?>/css/entrada.css">
    <?php endif; ?> -->
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="<?= $BASE_URL ?>/js/pagina.js"></script>


    <title><?= $titulo ?></title>
</head>
<body>
<header>
  <nav class="navbar">
    <ul id="ul-header">
      <!-- SE OBJETO USER NÃO ESTIVER SETADO: -->
      <?php if (!isset($user->username)): ?>
      <div class="div-condicional" id="div-nao-logado">
        <a href="<?= $BASE_URL ?>/login.php">
          <li id="login" class="link-disabled">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Login</span>
          </li>
        </a>

        <li id="home" class="dead-link">
          <i class="dead-link fa-solid fa-house"></i>
          <span>Home</span>
        </li>

        <li id="cadastro" class="dead-link">
          <i class="dead-link fa-solid fa-code-compare"></i>
          <span>Movimentações</span>
        </li>

        <li id="relatório" class="dead-link">
          <i class="dead-link fa-solid fa-database"></i>
          <span>Estoque</span>
        </li>

        <li id="fluxo" class="dead-link">
          <i class="dead-link fa-solid fa-rotate"></i>
          <span>Fluxo de Estoque</span>
        </li>
      </div>

      <!-- SE ESTIVER -->
      <?php else: ?>
        <div class="div-condicional" id="div1">
        
          <!-- LINK INDEX/HOME -->
          <a class="nav-link" href="<?= $BASE_URL ?>/index.php">
            <li id="home" class="nav-item link-enabled">
              <i id="cor0" class="fa-solid fa-house"></i>
              <span>Home</span>
            </li>
          </a>

          <!-- LINK CADASTRO NEW -->
          <a class="nav-link" href="<?= $BASE_URL ?>/movimentacao.php">
            <li id="cadastro" class="nav-item link-enabled">
              <i id="cor1" class="fa-solid fa-code-compare"></i>
              <span>Movimentações</span>
            </li>
          </a>
          
          <a class="nav-link" href="<?= $BASE_URL ?>/estoque.php">
            <li id="estoque" class="nav-item link-enabled">
              <i id="cor4" class="fa-solid fa-database"></i>
              <span>Estoque</span>
            </li>
          </a>

          <a class="nav-link" href="<?= $BASE_URL ?>/fluxoEstoque.php">
            <li id="fluxo" class="nav-item link-enabled">
              <i id="cor4" class="fa-solid fa-rotate"></i>
              <span>Fluxo de Estoque</span>
            </li>
          </a>
          
        </div>

        <div class="div-condicional" id="div2">
          <li id="sair" class="link-enabled-danger" onclick="location.href='<?= $BASE_URL ?>/php/processoSair.php';">
            <i id="cor2" class="fa-solid fa-right-to-bracket"></i>
            <span>Sair</span>
          </li>

          <li id="username" class="nav-item link-enabled">
            <i id ="cor5" class="fa-solid fa-user"></i>
            <span><?= $user->username ?></span>
          </li>

          
        </div>
      <!-- FIM IF -->
      <?php endif; ?>
        

    </ul>
  </nav>
</header>