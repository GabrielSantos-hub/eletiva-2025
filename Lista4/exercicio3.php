<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício - Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <h1 class="mb-4">Cadastro de Produtos</h1>

  <form method="post" class="mb-4">
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <div class="card mb-3"> <!-- quadro -->
        <div class="card-body">
          <h5 class="card-title">Produto <?= $i ?></h5>
          <div class="mb-2">
            <label for="codigo<?= $i ?>" class="form-label">Código</label>
            <input type="text" id="codigo<?= $i ?>" name="codigo[]" class="form-control" required>
          </div>
          <div class="mb-2">
            <label for="nome<?= $i ?>" class="form-label">Nome</label>
            <input type="text" id="nome<?= $i ?>" name="nome[]" class="form-control" required>
          </div>
          <div class="mb-2">
            <label for="preco<?= $i ?>" class="form-label">Preço (R$)</label>
            <input type="number" step="0.01" id="preco<?= $i ?>" name="preco[]" class="form-control" required>
          </div>
        </div>
      </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $codigos = $_POST['codigo'] ?? [];
      $nomes = $_POST['nome'] ?? [];
      $precos = $_POST['preco'] ?? [];

      $produtos = [];
      for ($i = 0; $i < count($codigos); $i++) {
          $codigo = $codigos[$i];
          $nome = $nomes[$i];
          $preco = (float)$precos[$i];
          if ($preco > 100) {
              $preco = $preco * 0.1;
          }
          $produtos[$codigo] = ['nome' => $nome, 'preco' => $preco];
      }
      uasort($produtos, function($a, $b) {
          return strcmp($a['nome'], $b['nome']);
      });
      echo "<h4 class='mt-3'>Lista de Produtos</h4>";
      echo "<ul class='list-group'>";
      foreach ($produtos as $codigo => $info) {
          $nome = $info['nome'];
          $preco = number_format($info['preco'], 2, ',', '.');
          echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
          echo "$codigo - $nome - R$ $preco";
          echo "</li>";
      }
      echo "</ul>";
  }
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
