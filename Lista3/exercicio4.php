<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-3">
    <h1>Exercício 4</h1>
    <form method="post">
      <div class="col-4 mb-3">
        <label for="dia" class="form-label">Informe o dia</label>
        <input type="number" id="dia" name="dia" class="form-control" required>
      </div>
      <div class="col-4 mb-3">
        <label for="mes" class="form-label">Informe o mês</label>
        <input type="number" id="mes" name="mes" class="form-control" required>
      </div>
      <div class="col-4 mb-3">
        <label for="ano" class="form-label">Informe o ano</label>
        <input type="number" id="ano" name="ano" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    function validarData($dia, $mes, $ano)
    {
      if (checkdate($mes, $dia, $ano)) {
        $dataFormatada = date("d/m/Y", strtotime("$ano-$mes-$dia"));
        return "A data informada existe: $dataFormatada";
      } else {
        return "A data informada não existe.";
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $dia = $_POST['dia'];
      $mes = $_POST['mes'];
      $ano = $_POST['ano'];

      echo "<p>" . validarData($dia, $mes, $ano) . "</p>";
    }
    ?>
  </div>
</body>

</html>