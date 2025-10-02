<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 2</h1>
        <form method="post">
            <div class="col-4 mb-3">
                <label for="palavra" class="form-label">Digite uma palavra</label>
                <input type="text" id="palavra" name="palavra" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $palavra = $_POST['palavra'];
            echo "<p>Todas em maiúsculo: " . palavraMaiusculo($palavra) . "</p>";
            echo "<p>Todas em minúsculo: " . palavraMinusculo($palavra) . "</p>";
        }
        function palavraMaiusculo($palavra)
        {
            return strtoupper($palavra);
        }
        function palavraMinusculo($palavra)
        {
            return strtolower($palavra);
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>