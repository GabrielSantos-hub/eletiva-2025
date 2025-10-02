<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Soma valores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <h1>Soma valores</h1>
    <form method="post">
      <div class="col-4 mb-3">
        <label for="valor" class="form-label">Valor 1</label>
        <input type="number" id="valor" name="valor1" class="form-control" required="">
      </div>
      <div class="col-4 mb-3">
        <label for="valor 2" class="form-label">Valor 2</label>
        <input type="number" id="valor 2" name="valor2" class="form-control" required="">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $valor1 = $_POST['valor1'];
      $valor2 = $_POST['valor2'];
      echo "A soma dos valores é: " . $valor1 + $valor2;
      // -  +  *  **  /  //  % 
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </div>
</body>

</html>