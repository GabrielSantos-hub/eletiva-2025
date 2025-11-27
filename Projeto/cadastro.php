<?php
  require("conexao.php");
  $erro = "";

  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      if(empty($nome) || empty($email) || empty($senha)){
          $erro = "Preencha todos os campos.";
      } else {
          try{
              // Verifica se e-mail já existe
              $stmt = $pdo->prepare("SELECT id FROM usuario WHERE email = ?");
              $stmt->execute([$email]);
              
              if($stmt->rowCount() > 0){
                  $erro = "E-mail já cadastrado.";
              } else {
                  // Criptografa e insere - impede que a senha apareça em texto no banco  
                  $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
                  $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
                  
                  if($stmt->execute([$nome, $email, $senhaHash])){
                      header("location: index.php?cadastro=true");
                      exit;
                  } else{
                      $erro = "Erro ao cadastrar.";
                  }
              }
          } catch(Exception $e){
              $erro = "Erro: ".$e->getMessage();
          }
      }
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro - Lavanderia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #e3f2fd;
      
      
      background: linear-gradient(rgba(227, 242, 253, 0.85), rgba(227, 242, 253, 0.85)), url('image_14.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      
      min-height: 100vh;
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
      max-width: 450px;
    }
    
    
    .btn-success {
      background-color: #a5d6a7;
      border: none;
      color: #1b5e20;
      font-weight: 500;
      padding: 10px;
      transition: all 0.3s;
    }
    .btn-success:hover {
      background-color: #81c784;
      color: #fff;
    }
    
    .link-login {
      color: #1e88e5;
      text-decoration: none;
      font-size: 0.9rem;
    }
    .link-login:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card">
    
    <h3 class="text-center text-secondary mb-4">Criar Nova Conta</h3>
    
    <?php if(!empty($erro)): ?>
        <div class="alert alert-danger text-center p-2 small">
            <?= $erro ?>
        </div>
    <?php endif; ?>

    <form action="cadastro.php" method="POST">
      <div class="mb-3">
        <label for="nome" class="form-label text-muted small">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label text-muted small">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required />
      </div>

      <div class="mb-4">
        <label for="senha" class="form-label text-muted small">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Crie uma senha" required />
      </div>

      <button type="submit" class="btn btn-success w-100 mb-3">Cadastrar</button>
    </form>
    
    <div class="text-center">
      <span class="text-muted small">Já tem uma conta? </span>
      <a href="index.php" class="link-login">Faça login aqui</a>
    </div>
  </div>

</body>
</html>