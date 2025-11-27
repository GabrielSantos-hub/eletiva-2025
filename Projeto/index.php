<?php
session_start();
//tela de login 
//logado, direto para o painel
if (isset($_SESSION['acesso']) && $_SESSION['acesso'] === true) {
  header("location: principal.php");
  exit;
}

$erro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  require('conexao.php');

  // Filtra os dados de entrada
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $senha = $_POST['senha'];

  try {
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se usuário existe e se a senha bate  
    if ($usuario && password_verify($senha, $usuario['senha'])) {
      $_SESSION['acesso'] = true;
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];
      header('location: principal.php');
      exit;
    } else {
      $erro = "E-mail ou senha incorretos.";
    }
  } catch (\Exception $e) {
    $erro = "Erro no sistema: " . $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Lavanderia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {

      background-color: #e3f2fd;

      background: linear-gradient(rgba(227, 242, 253, 0.8), rgba(227, 242, 253, 0.8)), url('image_14.png');
      /* Garante que a imagem cubra toda a tela sem distorcer */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      /* Mantém o fundo fixo ao rolar */

      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-card {
      background-color: #ffffff;
      border: none;
      border-radius: 15px;
      box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
      padding: 40px;
      width: 100%;
      max-width: 400px;
    }

    .brand-icon {
      font-size: 3rem;
      margin-bottom: 10px;
      display: block;
      text-align: center;
    }

    .btn-login {
      background-color: #90caf9;
      border: none;
      color: #fff;
      font-weight: 500;
      padding: 10px;
      transition: all 0.3s;
    }

    .btn-login:hover {
      background-color: #64b5f6;
      color: #fff;
    }

    .form-control:focus {
      border-color: #90caf9;
      box-shadow: 0 0 0 0.25rem rgba(144, 202, 249, 0.25);
    }

    .link-cadastro {
      color: #1e88e5;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .link-cadastro:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-card">
    <div class="brand-icon">🫧</div>
    <h3 class="text-center text-secondary mb-4">Lavanderia System</h3>

    <?php if (!empty($erro)): ?>
      <div class="alert alert-danger text-center p-2 small">
        <?= $erro ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == 'true'): ?>
      <div class="alert alert-success text-center p-2 small">
        Cadastro realizado! Faça login.
      </div>
    <?php endif; ?>

    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label text-muted small">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
      </div>
      <div class="mb-4">
        <label for="senha" class="form-label text-muted small">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="********" required>
      </div>
      <button type="submit" class="btn btn-login w-100 mb-3">Entrar</button>
    </form>

    <div class="text-center">
      <span class="text-muted small">Novo por aqui?</span>
      <a href="cadastro.php" class="link-cadastro">Crie sua conta</a>
    </div>
  </div>

</body>

</html>