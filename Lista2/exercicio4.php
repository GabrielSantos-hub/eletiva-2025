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
                <label for="produto" class="form-label">Informe o valor do produto</label>
                <input type="number" id="produto" name="produto" class="form-control" required="" step="any">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Valor = $_POST['produto'];

            if ($Valor >= 100) {
                $Descontado = $Valor * 0.15;
                $Descontado = $Valor - $Descontado;
                echo "Produto com 15% de desconto: " . round($Descontado, 2). "R$";
            } else {
                echo "<p>Não há desconto em produtos com um preço menor que 100R$ </p>";
                echo "Preço do produto: {$Valor}R$";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>