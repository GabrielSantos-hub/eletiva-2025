<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
body {
    background-color: #eef4fa;
}
h2 {
    color: #616161;
}
</style>
</head>
<body class="body">
  <div class="container mt-5">
    <?php
      if(isset($_GET['cadastro'])){
        $cadastro =$_GET['cadastro'];
        if($cadastro){
          echo"<p class='text-sucess'>Cadastro realizado com sucesso!</p>";
        }
        else{
          echo"<p class='text-danger'>Erro ao realizar o cadastro!</p>";
        }
      }

    ?>
    <h2 class="mb-4">Cadastro Usuário</h2>
    <form action="/login" method="POST">


    
    <div class="col-md-4">
        <label for="username" class="form-label">E-mail</label>
        <div class="input-group">
          <span class="input-group-text">@</span>
          <input type="email" class="form-control" id="emaillogin" name="email" placeholder="Digite seu email" require>
        </div>
      </div>

      <div class="col-4     mb-3">
        <label for="senhaLogin" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senhaLogin" name="senha" placeholder="Digite sua senha" required />
      </div>
      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    <p class="mt-3">
      Ainda não tem uma conta? 
      <a href="cadastro.php">Cadastre-se aqui</a>
    </p>
  </div>
</body>
</html>

