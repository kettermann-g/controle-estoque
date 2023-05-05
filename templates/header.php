<?php
  include_once("php/url.php");
  include_once("php/conexao.php");
  include_once("dao/UserDAO.php");

  $pagina = $_SERVER['REQUEST_URI'];

  if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
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
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/responsive.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/navbarStyle.css">
    <?php if ($pagina == "/controle-estoque/movimentacao.php" || $pagina == "/controle-estoque/movimentacao" ): ?>
      <link rel="stylesheet" href="<?= $BASE_URL ?>/css/cadastroNew.css">
    <?php endif; ?>

    <!-- <?php if ($pagina == "/controle-estoque/estrada" || $pagina == "/controle-estoque/entrada.php"): ?>
      <link rel="stylesheet" href="<?= $BASE_URL ?>/css/entrada.css">
    <?php endif; ?> -->

    
    
    <script defer src="<?= $BASE_URL ?>/js/pagina.js"></script>

    

    <title><?= $titulo ?></title>
</head>
<body>
<header>
  <nav class="navbar">
    <ul id="ul-header">
      <!-- SE OBJETO USER NÃO ESTIVER SETADO: -->
      <?php if (!isset($user->username)): ?>
        <a href="<?= $BASE_URL ?>/login.php">
          <li id="login" class="link-enabled">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Login</span>
          </li>
        </a>

        <li id="home" class="dead-link">
          <i class="dead-link fa-solid fa-house"></i>
          <span>Home</span>
        </li>

        <li id="cadastro" class="dead-link">
          <i class="dead-link fa-solid fa-arrow-up-from-bracket"></i>
          <span>Movimentações</span>
        </li>

        <li id="relatório" class="dead-link">
          <i class="dead-link fa-solid fa-file"></i>
          <span>Relatório</span>
        </li>

      <!-- SE ESTIVER -->
      <?php else: ?>
        <div id="div1">
          <li id="sair" class="link-enabled-danger" onclick="location.href='<?= $BASE_URL ?>/php/processoSair.php';">
            <span>Sair</span>
          </li>


          <li id="username" class="nav-item link-enabled">
            <i id ="cor5" class="fa-solid fa-user"></i>
            <span><?= $user->username ?></span>
          </li>
        </div>

        <div id="div2">
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
          <i id="cor1" class="fa-solid fa-arrow-up-arrow-down"></i>
          <span>Movimentações</span>
        </li>
      </a>
      
      <a class="nav-link" href="<?= $BASE_URL ?>/estoque.php">
        <li id="estoque" class="nav-item link-enabled">
          <i id="cor4" class="fa-solid fa-file"></i>
          <span>Estoque</span>
        </li>
      </a>
      </div>
      <!-- FIM IF -->
      <?php endif; ?>
        

    </ul>
  </nav>
</header>