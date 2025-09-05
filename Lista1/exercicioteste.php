<!doctype html>
<html lang="pt-br"> <!-- mudei de "en" para "pt-br" (idioma da página) -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      /* Adicionei imagem de fundo no body */
      background: url("fundo.jpg") no-repeat center center fixed;
      background-size: cover;
    }
    h1 {
      color: #1e40af; /* deixei o título azul */
      text-align: center; /* alinhei no centro */
      margin-bottom: 20px; /* dei espaçamento abaixo */
    }
    .form-box {
      /* Criei uma caixinha branca translúcida pro formulário */
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 15px; /* cantos arredondados */
      box-shadow: 0 4px 10px rgba(0,0,0,0.2); /* sombra leve */
    }
  </style>
</head>

<!-- Usei flexbox do Bootstrap para centralizar tudo na tela -->
<body class="d-flex justify-content-center align-items-center vh-100">

  <!-- Criei uma div com classe "form-box" para dar estilo na caixa -->
  <div class="container form-box" style="max-width: 700px;">

    <!-- Adicionei um logo acima do título -->
    <div class="text-center mb-3">
      <img src="img/logo.png" alt="Logo" width="120">
    </div>

    <!-- Título centralizado -->
    <h1>Exercício 2</h1>

    <!-- Formulário -->
    <form method="post">
      <div class="row justify-content-center"> <!-- usei row + justify-content-center p/ alinhar -->
        <div class="col-md-5 mb-3"> <!-- mudei de col-4 para col-md-5 para ficar maior -->
          <label for="valor1" class="form-label">VALOR 1</label>
          <input type="number" id="valor1" name="valor1" class="form-control" required>
        </div>
        <div class="col-md-5 mb-3"> <!-- idem aqui -->
          <label for="valor2" class="form-label">VALOR 2</label>
          <input type="number" id="valor2" name="valor2" class="form-control" required>
        </div>
      </div>
      
      <!-- Centralizei o botão -->
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>

    <!-- Resultado PHP -->
    <?php 
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valor1 = $_POST['valor1'];
        $valor2 = $_POST['valor2'];
        $sub = $valor1 - $valor2;

        // coloquei o resultado dentro de <p> centralizado e com destaque
        echo "<p class='mt-3 text-center'>A subtração dos valores é: <strong>$sub</strong></p>";
      }
    ?>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
