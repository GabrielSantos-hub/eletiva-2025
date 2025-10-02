<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 3</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-3">
    <h1>Exercício 3</h1>
    <form method="post">
      <div class="col-4 mb-3">
        <label for="palavra" class="form-label">Digite uma palavra</label>
        <input type="text" id="palavra" name="palavra" class="form-control" required>
      </div>
      <div class="row inline-row mb-3">
        <div class="col-md-4">
          <label for="palavra2" class="form-label">Digite outra palavra</label>
          <input type="text" id="palavra2" name="palavra2" class="form-control" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $palavra1 = $_POST['palavra'];
        $palavra2 = $_POST['palavra2'];

        if (verificarContido($palavra1, $palavra2)) {
            echo "<p>A palavra '{$palavra2}' está contida na palavra '{$palavra1}'</p>";
        } else {
            echo "<p>Não há palavra contida</p>";
        }
    }
    function verificarContido($palavra1, $palavra2) {
        return stripos($palavra1, $palavra2) !== false;
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
