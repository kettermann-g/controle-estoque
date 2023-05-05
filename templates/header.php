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

  $link = [];
  if (isset($user)) {
    $link['li'] = 'link-enabled';
    $link['i'] = 'i-link-enabled';
  } else {
    $link['li'] = 'link-disabled';
    $link['i'] = 'i-link-disabled';
  }

  

  if (in_array($pagina, ["/projeto-integrador-IENH/", "/projeto-integrador-IENH/index.php", "/projeto-integrador-IENH/index"])) {
    $tagHome = "link-disabled";
    $iHome = "i-link-disabled";
    $checkHome = true;
  } else {
    $tagHome = "link-enabled";
    $iHome = "i-link-enabled";
    $checkHome = false;
  }
  
  if (in_array($pagina, ["/projeto-integrador-IENH/cadastroNew.php", "/projeto-integrador-IENH/cadastroNew"])) {
    $tagCadastro = "link-disabled";
    $iCadastro = "i-link-disabled";
    $checkCadastro = true;
  } else {
    $tagCadastro = "link-enabled";
    $iCadastro = "i-link-enabled";
    $checkCadastro = false;
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
    <?php if ($pagina == "/projeto-integrador-IENH/cadastroNew.php" || $pagina == "/projeto-integrador-IENH/cadastroNew" ): ?>
      <link rel="stylesheet" href="<?= $BASE_URL ?>/css/cadastroNew.css">
    <?php endif; ?>

    

    <title><?= $titulo ?></title>
</head>
<body>
<header>
  <div class="div-logo">
   
  </div>
  <nav class="navbar">
    <ul>
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
          <span>Cadastro</span>
        </li>

        <li id="entrada" class="dead-link">
          <i class="dead-link fa-solid fa-plus"></i>
          <span>Entrada</span>
        </li>

        <li id="saída" class="dead-link">
          <i class="dead-link fa-solid fa-minus"></i>
          <span>Saída</span>
        </li>

        <li id="relatório" class="dead-link">
          <i class="dead-link fa-solid fa-file"></i>
          <span>Relatório</span>
        </li>
      <!-- SE ESTIVER -->
      <?php else: ?>
        <li id="sair" class="link-enabled-danger" onclick="location.href='<?= $BASE_URL ?>/php/processoSair.php';">
          <span>Sair</span>
        </li>


        <li id="username" class="link-enabled">
          <i id ="cor5" class="fa-solid fa-user"></i>
          <span><?= $user->username ?></span>
        </li>

      <!-- LINK INDEX/HOME -->
      <a href="<?= $BASE_URL ?>/index.php">
        <li id="home" class="<?= $tagHome ?>">
          <i <?php if (!$checkHome) {echo 'id="cor0"';}?> class="<?= $iHome ?> fa-solid fa-house"></i>
          <span>Home</span>
        </li>
      </a>

      <!-- LINK CADASTRO NEW -->
      <a href="<?= $BASE_URL ?>/cadastroNew.php">
        <li id="cadastro" class="<?= $tagCadastro ?>">
          <i <?php if (!$checkCadastro) {echo 'id="cor1"';}?> class="<?= $iCadastro ?> fa-solid fa-arrow-up-from-bracket"></i>
          <span>Cadastro</span>
        </li>
      </a>

      <li id="entrada" class="<?= $link['li'] ?>">
        <i <?php if (true) {echo 'id="cor2"';}?> class="<?= $link['li'] ?> fa-solid fa-plus"></i>
        <span>Entrada</span>
      </li>

      <li id="saida" class="<?= $link['li'] ?>">
        <i <?php if (true) {echo 'id="cor3"';}?> class="<?= $link['li'] ?> fa-solid fa-minus"></i>
        <span>Saída</span>
      </li>

      <li id="relatorio" class="<?= $link['li'] ?>">
        <i <?php if (true) {echo 'id="cor4"';}?> class="<?= $link['li'] ?> fa-solid fa-file"></i>
        <span>Relatório</span>
      </li>

      <!-- FIM IF -->
      <?php endif; ?>
        

    </ul>
  </nav>
</header>