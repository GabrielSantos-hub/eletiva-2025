<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício - Itens com Imposto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <h1 class="mb-4">Cadastro de Itens</h1>

  <form method="post" class="mb-4">
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <div class="mb-3">
        <label for="nome<?= $i ?>" class="form-label">Nome do item <?= $i ?></label>
        <input type="text" id="nome<?= $i ?>" name="nome[]" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="preco<?= $i ?>" class="form-label">Preço do item <?= $i ?> (R$)</label>
        <input type="number" step="0.01" id="preco<?= $i ?>" name="preco[]" class="form-control" required>
      </div>
    <?php endfor; ?>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nomes = $_POST['nome'] ?? [];
      $precos = $_POST['preco'] ?? [];

      $itens = [];
      for ($i = 0; $i < count($nomes); $i++) {
          $nome = $nomes[$i];
          $preco = (float)$precos[$i];
          $preco_com_imposto = $preco * 1.15;
          $itens[$nome] = $preco_com_imposto;
      }

      asort($itens);
      echo "<h4 class='mt-3'>Lista de Itens com Imposto</h4>";
      echo "<ul class='list-group'>";
      foreach ($itens as $nome => $preco) {
          $preco_formatado = number_format($preco, 2, ',', '.');
          echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
          echo "$nome -- R$$preco_formatado";
          echo "</li>";
      }
      echo "</ul>";
  }
  ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
