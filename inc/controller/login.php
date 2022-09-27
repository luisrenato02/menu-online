<?php
session_start();

require_once __DIR__ . '../../class/user.php';

// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
if (isset($_SESSION['uid']) != "") {
  header("Location: " . $config->urlLocal . "/admin/");
  exit;
}

$error = false;


//Verifica o pressionamento da tecla entrar da tela login.
if (isset($_POST["btn-login"])) {
  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);

  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);

  if (empty($username)) {
    $error = true;
    $username_err = "Login é um campo obrigatório";
  }
  if (empty($password)) {
    $error = true;
    $password_err = "A senha é um campo obrigatório";
  }

  //se todos os campos estiverem preenchidos  transforma a senha digitada na criptografia sha256
  if (!$error) {
    $password_hash = hash('sha256', $password);

    $user = new user();
    $user->setUsername($username);
    $resp = $user->getUserByUsername();
    $strow = $resp->fetch();
    $stcount = $resp->rowCount();

    //Verifica se o user selecionado condiz com a senha criptografada.
    if ($stcount == 1 && $strow['password'] == $password_hash) {
      $_SESSION['loggedin'] = true;
      $_SESSION['uid'] = $strow['id'];
      unset($_POST);
      header("Location: " . $config->urlLocal . "/admin/");
      exit;

      //Mostra uma mensagem de erro caso o st seja igual a 1 indicando que o username está errado
    } else if ($stcount == 0) {
      $errorType = "danger";
      $errorMSG = "O nome de usuário inserido não pertence a uma conta. Verifique seu nome de usuário e tente novamente.";

      //Mostra uma mensagem de erro caso o st seja igual a 0 indicando que a senha está errada
    } else if ($stcount == 1 && $strow['password'] !== $password_hash) {
      $errorType = "danger";
      $errorMSG = "Senha incorreta.";
    }
  }
}
